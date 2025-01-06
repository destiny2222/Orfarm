<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Notifications\OrderConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Paystack;

class PaymentController extends Controller
{


    public function redirectToGateway(Order $order)
    {
        try {
            // Get the current user's cart items
            $cartItems = Cart::where('user_id', Auth::user()->id)->get();

            // Check if cart is empty
            if ($cartItems->isEmpty()) {
                return redirect()->back()->with('error', 'Your cart is empty.');
            }


            $paymentData = [
                'first_name' => $order->shipping_first_name,
                'email' => $order->shipping_email,
                'amount' => $order->total_amount * 100,
                "reference" => Paystack::genTranxRef(),
                // 'callback_url' => route(''),
                "currency" => "NGN",
                'metadata' => [
                    'order_id' => $order->id
                ],
                'customer' => [
                    'first_name' => $order->shipping_first_name,
                    'email' => $order->shipping_email,
                    'phone' => $order->shipping_phone,
                ]
            ];

            // orderItems
            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->price,
                ]);
            }


            // Update checkout with transaction reference
            $order->update([
                'transaction_reference' => $paymentData['reference']
            ]);
            return Paystack::getAuthorizationUrl($paymentData)->redirectNow();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }


    public function handleCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        // dd($paymentDetails);

        try {


            $order = Order::where('transaction_reference', $paymentDetails['data']['reference'])
                ->latest()
                ->first();

            // Add a check to make sure order exists
            if (!$order) {
                return back()->with('error', 'Order not found');
            }

            if ($paymentDetails['data']['status'] === 'success') {
                // Update order status
                $order->update([
                    // 'payment_status' => 'processing',
                    // 'order_status' => 'processing'
                ]);
                return redirect()->route('orders.index')->with('success', 'Payment is in progress. You will be notify when the transaction is completed!');
            } else {
                $order->update([
                    'payment_status' => 'unpaid',
                    'order_status' => 'failed'
                ]);

                return back()->with('error', 'Payment failed');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Payment verification failed');
        }

    }

    public function handleWebhook(Request $request)
    {
        // ... existing signature verification code ...

        $payload = json_decode($request->getContent(), true);
        $event = $payload['event'];
        $data = $payload['data'];

        Log::info('Webhook payload', ['payload' => $payload]); // Log full payload

        if ($event === "charge.success") {
            $order = Order::where('transaction_reference', $data['reference'])->first();

            if ($order) {
                try {
                    // Update with fresh() to ensure we get the latest data
                    $order->payment_status = 'paid';
                    $order->save();

                    // Verify the update
                    $updatedOrder = Order::find($order->id)->fresh();
                    /* The line `Log::info('Order after update', ['order_id' => ->id,
                    'new_status' => ->payment_status]);` is logging information about
                    the order after it has been updated. */
                    Log::info('Order after update', [
                        'order_id' => $updatedOrder->id,
                        'new_status' => $updatedOrder->payment_status
                    ]);

                    // Clear user's cart
                    Cart::where('user_id', $order->user_id)->delete();

                    // Send email to user
                    $user = User::find($order->user_id);
                    $user->notify(new OrderConfirmation($order));
                } catch (\Exception $e) {
                    Log::error('Failed to update order', [
                        'order_id' => $order->id,
                        'error' => $e->getMessage(),
                        'trace' => $e->getTraceAsString()
                    ]);
                    return response()->json(['error' => $e->getMessage()], 500);
                }
            } else {
                Log::warning('Order not found', ['reference' => $data['reference']]);
                return response()->json(['error' => 'Order not found'], 404);
            }
        }

        return response()->json(['status' => 'success'], 200);
    }
}

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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Paystack;

class PaymentController extends Controller
{


    public function redirectToGateway(Order $order){
        try{
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
        }catch(\Exception $e) {
            Log::error($e->getMessage());
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }   
    }


    public function handleCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        // dd($paymentDetails);

        try {
           

            $order = Order::where('transaction_reference', $paymentDetails['data']['reference'])->latest();

            if ($paymentDetails['data']['status'] === 'success') {
                // Update order status
                $order->update([
                    'payment_status' => 'processing',
                    // 'order_status' => 'processing'
                ]);

                return redirect()->route('orders.index')->with('success', 'Payment is in progress. You will be notify when the transaction is completed!');
            } else {
                $order->update([
                    'payment_status' => 'failed',
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
        // First check is the headeris present. Else, terminate the code.
        if (!$request->hasHeader("x-paystack-signature"))
            exit("No header present");

        // Get our paystack screte key 
        $secret = config('services.paystack.secret_key');

        // Validate the signature
        if ($request->header("x-paystack-signature") !== hash_hmac("sha512", $request->getContent(), $secret))
            exit("Invalid signatute");
            $event = $request->event; // event type. e.g charge.success
            $data = $request->data; // request payload.

        // You can log it into laravel.log for view all the data sent from paystack
        Log::info('PAYSTACK PAYLOAD', ['data' => $data]);

        if ($event === "charge.success") {
            // Transaction info
            $order = Order::where('transaction_reference', $data['reference'])->first();
            // Update order status
            $order->update([
                'payment_status' => 'completed',
                // 'order_status' => 'pending'
            ]);
            // Clear user's cart
            Cart::where('user_id', $order->user_id)->delete();

            // Send email to user
            $user = User::find($order->user_id);
            $user->notify(new OrderConfirmation($order));
            
        }

        return response()->json('', 200);
    }
}

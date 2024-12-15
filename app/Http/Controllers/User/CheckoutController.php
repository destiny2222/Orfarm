<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CheckoutRequest;
use App\Models\Order;

class CheckoutController extends Controller
{

    protected $paymentController;

    public function __construct(PaymentController $paymentController)
    {
        $this->paymentController = $paymentController;
    }


    public function checkout(){
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $total = $cart->sum(function($item) {
            return $item->product->price * $item->quantity;
        });


        return view('frontend.checkout', [
            'cartItems' => $cart,
            'total' => $total,
            'user' => Auth::user(),
        ]);
    }


    public function processCheckout(CheckoutRequest $request){
        try {
            // Shipping Details
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'shipping_different' => $request->shipping_different ?? false,
                'shipping_first_name' => $request->shipping_different ? $request->shipping_first_name : null,
                'shipping_last_name' => $request->shipping_different ? $request->shipping_last_name : null,
                'shipping_email' => $request->shipping_different ? $request->shipping_email : null,
                'shipping_phone' => $request->shipping_different ? $request->shipping_phone : null,
                'shipping_country' => $request->shipping_different ? $request->shipping_country : null,
                'shipping_state' => $request->shipping_different ? $request->shipping_state : null,
                'shipping_city' => $request->shipping_different ? $request->shipping_city : null,
                'shipping_address' => $request->shipping_different ? $request->shipping_address : null,
                'shipping_postal_code' => $request->shipping_different ? $request->shipping_postal_code : null,
                // Total Amount
                'total_amount' => $this->calculateTotal(),
                'payment_method' => 'paystack',
            ]);

            // Initiate Paystack Payment
            return $this->paymentController->redirectToGateway($order);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Checkout failed: ' . $e->getMessage());
        }
    }


    private function calculateTotal()
    {
        return Cart::where('user_id', Auth::user()->id)
            ->get()
            ->sum(function($item) {
                return $item->product->price * $item->quantity;
            });
    }


}

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
            // dd($request->all());
            // Shipping Details
            $order = Order::create([
                'user_id' => Auth::user()->id,
                // 'shipping_default' => $request->shipping_default ?? false,
                'shipping_first_name' => $request->shipping_first_name ,
                'shipping_last_name' => $request->shipping_last_name ,
                'shipping_email' => $request->shipping_email ,
                'shipping_phone' => $request->shipping_phone ,
                'shipping_country' => $request->shipping_country ,
                'shipping_state' => $request->shipping_state ,
                'shipping_city' => $request->shipping_city ,
                'shipping_address' => $request->shipping_address ,
                'shipping_postal_code' => $request->shipping_postal_code ,
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


    public function failed(){
        return view('frontend.failed_order');
    }

    public function success(){
        return view('frontend.success_order');
    }

}

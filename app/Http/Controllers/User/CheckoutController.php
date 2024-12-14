<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(){
        $cartItems = Cart::where('user_id', Auth::user()->id)->get();
        $totalPrice = $cartItems->sum('product.price * quantity');  // Assuming price and quantity are fields in the Product model
        // dd($totalPrice);
        return view('frontend.checkout', [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice
        ]);
    }
}

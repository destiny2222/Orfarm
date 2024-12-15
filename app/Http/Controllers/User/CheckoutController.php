<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(){
        $cartItem = Cart::where('user_id', Auth::user()->id)->get();
        return view('frontend.checkout', [
            'cartItems' => $cartItem,
        ]);
    }
}

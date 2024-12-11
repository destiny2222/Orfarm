<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cart()
    {
        return view('frontend.cart');
    }
  
   
    public function addToCart(CartRequest $request)
    {
        // dd($request->all());
         // Check if user is not authenticated
         if (!Auth::check()) {
            // Store the current full URL with all parameters as the intended destination
            Session::put('url.intended', url()->full());
            
            // Redirect to registration page
            return redirect()->route('register');
        }
        try {
            $existingCartItem = Cart::where('product_id', $request->id)
                ->where('user_id', Auth::user()->id)
                ->first();
    
            if ($existingCartItem) {
                // Increment quantity instead of replacing
                $existingCartItem->increment('quantity', $request->quantity);
            } else {
                Cart::create([
                    'product_id' => $request->id,
                    'user_id' => Auth::user()->id,
                    'quantity' => $request->quantity
                ]);
            }
    
            return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
        } catch(\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while adding to cart.');
        }
    }
  

    public function remove(Request $request)
    {
        try {
            $cartItem = Cart::where('product_id', $request->id)
                ->where('user_id', Auth::user()->id)
                ->first();
    
            if ($cartItem) {
                // If quantity is 1, remove the entire cart item
                if ($cartItem->quantity <= 1) {
                    $cartItem->delete();
                } else {
                    // Decrement the quantity by 1
                    $cartItem->decrement('quantity');
                }
    
                return redirect()->back()->with('success', 'Product quantity reduced successfully!');
            }
    
            return redirect()->back()->with('error', 'Cart item not found.');
        } catch(\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong while removing from cart.');
        }
    }
  
  
    public function destroy(Request $request)
    {
        try{
            $cart = Cart::where('user_id', Auth::user()->id)->firstOrFail();
            $cart->delete();
            return redirect()->back()->with('success', 'Cart removed successfully!');
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong, please try again later.');
        }
        
    }
}

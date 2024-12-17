<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(){
        $user  = Auth::user();
        return view("dash.index", [
            'user'=>$user,
        ]);
    }

    public function profileView(){
        $user  = Auth::user();
        return view('dash.user-account',[
            'user' => $user
        ]);
    }



    public function orderHistory(){
        $user  = Auth::user();
        $order = Order::where('user_id', Auth::user()->id)->get();
        return view('dash.order_list', [
            'orders'=>$order,
            'user'=>$user,
        ]);
    }

}

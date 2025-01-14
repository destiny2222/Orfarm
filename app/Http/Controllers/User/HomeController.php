<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(){
        $user  = Auth::user();
        $order = Order::where('user_id', $user->id)->get();
        // completed order
        $completedOrder = Order::where('user_id', $user->id)->where('order_status', 'completed')->count();
        // processing order
        $processedOrder = Order::where('user_id', $user->id)->where('order_status', 'processing')->count();
        // pending orders
        $pendingOrder = Order::where('user_id', $user->id)->where('order_status', 'pending')->count();
        // failed orders
        $failedOrder = Order::where('user_id', $user->id)->where('order_status', 'failed')->count();
        return view("dash.index", [
            'user'=>$user,
            'orders'=>$order,
            'total_orders'=>$order->count(),
            'total_completed_orders'=>$completedOrder,
            'total_processing_orders'=>$processedOrder,
            'total_pending_orders'=>$pendingOrder,
            'total_failed_orders'=>$failedOrder,
        ]);
    }

    public function profileView(){
        $user  = Auth::user();
        return view('dash.user-account',[
            'user' => $user
        ]);
    }



    public function orderHistory() {
        $user = Auth::user();
        
        // Get order items directly with a single query
        $orderItems = OrderItem::whereHas('order', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with('product')->get();
    
        // Get counts for different order statuses
        $completedOrder = Order::where('user_id', $user->id)
            ->where('order_status', 'completed')
            ->count();
        
        $processedOrder = Order::where('user_id', $user->id)
            ->where('order_status', 'processing')
            ->count();
        
        $pendingOrder = Order::where('user_id', $user->id)
            ->where('order_status', 'pending')
            ->count();
        
        $failedOrder = Order::where('user_id', $user->id)
            ->where('order_status', 'failed')
            ->count();
    
        $totalOrders = Order::where('user_id', $user->id)->count();
    
        return view('dash.order_list', [
            'orderHistory' => $orderItems,
            'user' => $user,
            'total_orders' => $totalOrders,
            'total_completed_orders' => $completedOrder,
            'total_processing_orders' => $processedOrder,
            'total_pending_orders' => $pendingOrder,
            'total_failed_orders' => $failedOrder,
        ]);
    }

    public function invoice($id){
        $shipping = Shipping::where('status', 1)->first();
        $orderItems = OrderItem::findOrFail($id);
        return view('frontend.invoice',[
            'orderItems'=>$orderItems,
            'shipping'=>$shipping
        ]);
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){
        $orderItem  =  OrderItem::orderBy('id', 'desc')->paginate(50);
        return view('admin.order.index', [
            'orderItems' => $orderItem,
        ]);
    }

    public function update(Request $request, $id){
        try {
            $order = Order::findOrFail($id);
            $order->update([
                'order_status' => $request->order_status,
                'payment_status' => $request->payment_status,
            ]);
            return back()->with('success', 'Order updated successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Something went wrong, please try again');
        }
    }



    public function pendingOrder(){
        $orderItem = OrderItem::whereHas('order', function($query) {
            $query->where('order_status', 'pending');
        })->paginate(50);
        return view('admin.order.pending', [
            'orderItems' => $orderItem,
        ]);
    }

        public function processingOrder(){
            $orderItem = OrderItem::whereHas('order', function($query) {
                $query->where('order_status', 'processing');
              })->paginate(50);
            return view('admin.order.processing', [
                'orderItems' => $orderItem,
            ]);
        }

        public function deliveredOrder(){
            $orderItem = OrderItem::whereHas('order', function($query) {
                $query->where('order_status', 'delivered'); })->paginate(50);
            return view('admin.order.delivered', [
                'orderItems' => $orderItem,
            ]);
        }

        public function cancelledOrder(){
            $orderItem = OrderItem::whereHas('order', function($query) {
            $query->where('order_status', 'cancelled'); })->paginate(50);
            return view('admin.order.cancelled', [
                'orderItems' => $orderItem,
            ]);
        }

        public function destroy($id){
            try {
                $orderItem  =  OrderItem::findOrFail($id);
                $orderItem->delete();
                return back()->with('success', 'Order Item Deleted Successfully');
            } catch (\Exception $exception) {
                Log::error($exception->getMessage());
                return back()->with('error', 'Something went wrong, please try again');
            }
        }



}

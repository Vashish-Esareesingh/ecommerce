<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderHistoryController extends Controller
{
    // Display page and all orders specific to a user
    public function index()
    {
        $order_data = Auth::user()
        ->orders()
        ->paidOrders()
        ->get()
        ;

        return view('orders.order-history', compact('order_data'));
    }

    public function show(string $id)
    {
        $user = Auth::user();
        $address = Address::find(1);

        // Ensures the order belongs to a specific user and is paid
        $order = Order::where('id', $id)
        ->where('user_id', $user->id)
        ->paidOrders()
        ->first();

        if (empty($order)) {
            abort(404);
        }

        $product_data = $order->products;

        return view('orders.order-details', compact('user', 'order', 'address', 'product_data'));
    }
}

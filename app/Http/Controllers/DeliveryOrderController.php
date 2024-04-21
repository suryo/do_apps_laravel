<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class DeliveryOrderController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->input('status');

        $query = Order::query();

        if ($status) {
            $query->where('status', $status);
        }

        $orders = $query->get();

        return view('deliveryorder.index', compact('orders'));
    }

    public function show(Order $order)
    {
        // Tampilkan detail pesanan
        return view('deliveryorder.show', compact('order'));
    }

    public function approve(Order $order)
    {
        // Set status pesanan menjadi approved
        $order->update(['status' => 'approved']);

        // Redirect atau tampilkan pesan sukses
    }
}

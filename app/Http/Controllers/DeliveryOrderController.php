<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;


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

    public function show($order)
    {
      
        // Generate nomor order
        $orderNumber = date('dmYHis');
        $order = Order::findOrFail($order);

        $carts = DB::table('order_details as c')
            ->join('products as p', 'c.idproduct', '=', 'p.id')
            ->select('c.*', 'p.product_name', 'p.product_detail', 'p.product_price', 'p.product_length', 'p.product_width', 'p.product_height', 'p.product_weight')
            ->where('c.deleted', 'false')
            ->where('c.nomerorder', $order->nomerorder)
            ->get();

          

        // Set data order detail
        $orderDetails = [];
        
        // Tampilkan detail pesanan
        return view('deliveryorder.show', compact('carts','order', 'orderDetails'));
    }

    public function approve(Order $order)
    {
        // Set status pesanan menjadi approved
        $order->update(['status' => 'approved']);
        return redirect()->route('deliveryorders.index');
        // Redirect atau tampilkan pesan sukses
    }
}

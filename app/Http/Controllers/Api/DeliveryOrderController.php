<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

class DeliveryOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mendapatkan status dari permintaan
    $status = $request->input('status');

    // Query dasar
    $query = Order::query();

    // Filter berdasarkan status
    if ($status) {
        $query->where('status', $status);
    }

    // Mendapatkan data order sesuai dengan filter
    $orders = $query->get();

    return response()->json($orders);
    }

 
    public function show(Order $order)
    {
        return response()->json($order);
    }

    public function approve($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 'approve']);
        $order->update([
            'status' => 'approve',
            'addcatatan' => '-'
        ]);

        return response()->json(['message' => 'Order has been approved']);
    }

    public function reject(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => 'reject',
            'addcatatan' => $request->input('reason_status')
        ]);

        return response()->json(['message' => 'Order has been rejected']);
    }

    public function revisi(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => 'revisi',
            'addcatatan' => $request->input('reason_status')
        ]);

        return response()->json(['message' => 'Order needs revision']);
    }
}

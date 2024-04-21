<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderDetail;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data keranjang untuk ditampilkan pada halaman checkout
        // $carts = Cart::where('deleted', 'false')->get();

        $carts = DB::table('carts as c')
            ->join('products as p', 'c.product_id', '=', 'p.id')
            ->select('c.*', 'p.product_name', 'p.product_detail', 'p.product_price', 'p.product_length', 'p.product_width', 'p.product_height', 'p.product_weight')
            ->where('c.deleted', 'false')
            ->get();
        // Hitung subtotal
        $subtotal = $carts->sum('total');

        // Hitung subtotal
        $totalPrice = $carts->sum('total');

        return view('checkout.index', compact('carts', 'subtotal', 'totalPrice'));
    }

    public function CheckDeliveryOrder(Request $request)
    {
        // Generate nomor order
        $orderNumber = date('dmYHis');

        // Set data order
        $order = [
            'nomerorder' => $orderNumber,
            'iduser' => 1,
            'status' => 'draft',
            'itemsubtotal' => $request->itemsubtotal,
            'tax' => 0,
            'shippingprice' => $request->shippingprice,
            'ordertotal' => $request->itemsubtotal + $request->shippingprice,
            'payment' => 0,
            'pengiriman' => $request->pengiriman,
            'namalengkap' => 'Suryo Atmojo',
            'firstname' => "Suryo",
            'lastname' => "Atmojo",
            'negara' => "Indonesia",
            'provinsi' => "Jawa Timur",
            'kota' => "Surabaya",
            'kecamatan' => "Sukolilo",
            'alamat' => "Jl. Medokan Semampir Indah",
            'kodepos' => $request->post_destination_postal_code,
            'email' => "suryoatm@gmail.com",
            'phone' => "081217173406",
            'addcatatan' => "-",
            'payment_id' => "",
            'payment_method' => "",
            'payment_status' => "",
            'tracking_number' => "",
            'deleted' => false
        ];

        $carts = DB::table('carts as c')
            ->join('products as p', 'c.product_id', '=', 'p.id')
            ->select('c.*', 'p.product_name', 'p.product_detail', 'p.product_price', 'p.product_length', 'p.product_width', 'p.product_height', 'p.product_weight')
            ->where('c.deleted', 'false')
            ->get();

        // Set data order detail
        $orderDetails = [];
        foreach ($carts as $cart) {
            $orderDetails[] = [
                'nomerorder' => $orderNumber,
                'idproduct' => $cart->id,
                'hargaproduk' => $cart->product_price,
                'qty' => $cart->quantity,
                'subtotalproduk' => $cart->total,
                'note' => "-",
                'review' => "-",
                'status' => null
            ];
        }

        return view('checkout.deliveryorder', compact('carts','order', 'orderDetails'));
    }



    public function saveDraft(Request $request)
    {
        dump("save draft");
        // Ambil data order dan order detail dari request
        $order = json_decode($request->order, true);
        $orderDetails = json_decode($request->orderDetails, true);
        // dd($order);
        // dd($orderDetails);
        // Simpan data order ke dalam database dengan status draft
        $newOrder = Order::create(array_merge($order, ['status' => 'draft'], ['deleted' => 'false']));
        foreach ($orderDetails as $detail) {
            orderDetail::create($detail);
        }

         // Set semua item di keranjang sebagai soft deleted
         Cart::where('deleted', 'false')->update(['deleted' => 'true']);

        // Set pesan sukses atau error jika diperlukan
        $message = "Draft berhasil disimpan";
        return redirect()->route('deliveryorders.index')->with('success', $message);
    }

    public function submitApproval(Request $request)
    {
        // Ambil data order dan order detail dari request
        $order = json_decode($request->order, true);
        $orderDetails = json_decode($request->orderDetails, true);

        // Simpan data order ke dalam database dengan status needapproval
        $newOrder = Order::create(array_merge($order, ['status' => 'needapproval'],['deleted' => 'false']));
        foreach ($orderDetails as $detail) {            
            orderDetail::create($detail);
        }

         // Set semua item di keranjang sebagai soft deleted
         Cart::where('deleted', 'false')->update(['deleted' => 'true']);

        // Set pesan sukses atau error jika diperlukan
        $message = "Pesanan berhasil diajukan untuk persetujuan";
        return redirect()->route('deliveryorders.index')->with('success', $message);
        // Redirect atau kembalikan pesan sukses/error
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

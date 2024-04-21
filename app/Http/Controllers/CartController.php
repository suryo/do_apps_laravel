<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {

        $carts = Cart::where('carts.deleted', 'false')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select('carts.*', 'products.product_name', 'products.product_price', 'products.product_length', 'products.product_width', 'products.product_height', 'products.product_weight')
            ->get();
        $subtotal = $carts->sum('total');
        return view('carts.index', compact('carts', 'subtotal'));
    }

    public function create()
    {
        // Tampilkan formulir untuk menambahkan item ke keranjang (jika perlu)
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi data masukan
        // $request->validate([
        //     // Atur aturan validasi sesuai kebutuhan
        // ]);

        // Cart::create($request->all());

        $product = Product::findOrFail($request->product_id);

        Cart::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total' => $request->quantity * $product->product_price, // Hitung total berdasarkan harga produk
        ]);

        // Simpan data baru ke dalam database


        // Redirect ke halaman indeks atau halaman lain
        return redirect()->route('carts.index');
    }

    public function show($id)
    {
        $cart = Cart::findOrFail($id);
        return view('carts.show', compact('cart'));
    }

    public function edit($id)
    {
        $cart = Cart::findOrFail($id);
        return view('carts.edit', compact('cart'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data masukan
        $request->validate([
            // Atur aturan validasi sesuai kebutuhan
        ]);

        // Perbarui data yang ada di database
        $cart = Cart::findOrFail($id);
        $cart->update($request->all());

        // Redirect ke halaman indeks atau halaman lain
        return redirect()->route('carts.index');
    }

    public function destroy($id)
    {
        // Temukan data yang akan dihapus dan update deleted = true
        $cart = Cart::findOrFail($id);
        $cart->update(['deleted' => 'true']);

        // Redirect ke halaman indeks atau halaman lain
        return redirect()->route('carts.index');
    }

    public function clear()
    {
        // Set semua item di keranjang sebagai soft deleted
        Cart::where('deleted', 'false')->update(['deleted' => 'true']);

        // Redirect kembali ke halaman keranjang dengan pesan sukses
        return redirect()->route('carts.index')->with('success', 'All items have been soft deleted from the cart!');
    }
}

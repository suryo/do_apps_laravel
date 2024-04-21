<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sku' => 'required',
            'product_category' => 'required',
            'product_name' => 'required',
            'product_detail' => 'required',
            'product_brand' => 'required',
            'product_price' => 'required',
            'status' => 'required',
        ]);

        Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'sku' => 'required',
            'product_category' => 'required',
            'product_name' => 'required',
            'product_detail' => 'required',
            'product_brand' => 'required',
            'product_price' => 'required',
            'status' => 'required',
        ]);

        Product::whereId($id)->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}

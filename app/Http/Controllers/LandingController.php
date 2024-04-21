<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class LandingController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('landing', compact('products'));
    }

    public function product_detail($id)
    {
        $product = Product::findOrFail($id);
        return view('product_detail', compact('product'));
    }


}

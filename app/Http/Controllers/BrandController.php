<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            'product_brand' => 'required',
            'status' => 'required',
        ]);

        Brand::create($validatedData);

        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
    }

    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.show', compact('brand'));
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_brand' => 'required',
            'status' => 'required',
        ]);

        Brand::whereId($id)->update($validatedData);

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $productCategories = ProductCategory::all();
        return view('product_categories.index', compact('productCategories'));
    }

    public function create()
    {
        return view('product_categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_category_name' => 'required',
            'status' => 'required',
        ]);

        ProductCategory::create($validatedData);

        return redirect()->route('product-categories.index')->with('success', 'Product Category created successfully.');
    }

    public function show($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        return view('product_categories.show', compact('productCategory'));
    }

    public function edit($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        return view('product_categories.edit', compact('productCategory'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_category_name' => 'required',
            'status' => 'required',
        ]);

        ProductCategory::whereId($id)->update($validatedData);

        return redirect()->route('product-categories.index')->with('success', 'Product Category updated successfully.');
    }

    public function destroy($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        $productCategory->delete();

        return redirect()->route('product-categories.index')->with('success', 'Product Category deleted successfully.');
    }
}

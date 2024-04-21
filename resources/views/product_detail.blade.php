<!-- resources/views/product/detail.blade.php -->

@extends('layouts.app')

@section('title', $product->product_name . ' - Product Detail')

@section('content')
    <h1>{{ $product->product_name }}</h1>
    <p>SKU: {{ $product->sku }}</p>
    <p>Category: {{ $product->product_category }}</p>
    <p>Brand: {{ $product->product_brand }}</p>
    <p>Price: ${{ $product->product_price }}</p>
    <p>Status: {{ $product->status }}</p>
    <p>Description: {{ $product->product_detail }}</p>

    <form action="{{ route('carts.store') }}" method="POST">
        @csrf
        <label for="quantity">User ID:</label>
        <input type="text" name="user_id" value="1">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="1" min="1">
        <button type="submit">Add to Cart</button>
    </form>
@endsection

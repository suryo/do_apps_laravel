<!-- resources/views/carts/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Cart Detail</h1>

    <p><strong>ID:</strong> {{ $cart->id }}</p>
    <p><strong>User ID:</strong> {{ $cart->user_id }}</p>
    <p><strong>Product ID:</strong> {{ $cart->product_id }}</p>
    <p><strong>Quantity:</strong> {{ $cart->quantity }}</p>
    <p><strong>Total:</strong> {{ $cart->total }}</p>

    <a href="{{ route('carts.index') }}" class="btn btn-secondary">Back</a>
@endsection

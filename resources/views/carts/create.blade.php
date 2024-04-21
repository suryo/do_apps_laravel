<!-- resources/views/carts/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Add Item to Cart</h1>

    <form action="{{ route('carts.store') }}" method="POST">
        @csrf

        <!-- Tambahkan input fields untuk setiap field pada model "Cart" -->
        <!-- Contoh: -->
        <div class="form-group">
            <label for="user_id">User ID:</label>
            <input type="number" name="user_id" id="user_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="product_id">Product ID:</label>
            <input type="number" name="product_id" id="product_id" class="form-control" required>
        </div>
        <!-- ... -->
        
        <button type="submit" class="btn btn-primary">Add Item</button>
        <a href="{{ route('carts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection

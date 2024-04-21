<!-- resources/views/carts/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Cart Item</h1>

    <form action="{{ route('carts.update', $cart->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Tampilkan data yang ingin diubah -->
        <!-- Contoh: -->
        <div class="form-group">
            <label for="user_id">User ID:</label>
            <input type="number" name="user_id" id="user_id" class="form-control" value="{{ $cart->user_id }}" required>
        </div>
        <div class="form-group">
            <label for="product_id">Product ID:</label>
            <input type="number" name="product_id" id="product_id" class="form-control" value="{{ $cart->product_id }}" required>
        </div>
        <!-- ... -->
        
        <button type="submit" class="btn btn-primary">Update Item</button>
        <a href="{{ route('carts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection

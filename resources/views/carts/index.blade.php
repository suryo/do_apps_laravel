@extends('layouts.app')

@section('content')
    <h1>Cart List</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ url('/') }}" class="btn btn-primary">Add Item to Cart</a>
        <form action="{{ route('carts.clear') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Clear Cart</button>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                {{-- <th>ID</th> --}}
                <th>Product Name</th>
                <th>Length</th>
                <th>Width</th>
                <th>Height</th>
                <th>Weight</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carts as $cart)
                <tr>
                    {{-- <td>{{ $cart->id }}</td> --}}
                    <td>{{ $cart->product_name }}</td>
                    <td>{{ $cart->product_length }}</td>
                    <td>{{ $cart->product_width }}</td>
                    <td>{{ $cart->product_height }}</td>
                    <td>{{ $cart->product_weight }}</td>
                    <td>{{ $cart->product_price }}</td>
                    <td>{{ $cart->quantity }}</td>
                    <td>{{ $cart->total }}</td>
                    <td>
                        {{-- <a href="{{ route('carts.show', $cart->id) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('carts.edit', $cart->id) }}" class="btn btn-secondary btn-sm">Edit</a> --}}
                        <form action="{{ route('carts.destroy', $cart->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4">Subtotal</td>
                <td>{{ $subtotal }}</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4">Diskon</td>
                <td>
                    <input type="number" name="discount" id="discount" value="0">
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4">Total</td>
                <td>{{ $subtotal }}</td>
                <td>
                    <a href="{{ route('checkout') }}" class="btn btn-success btn-sm">Checkout</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection

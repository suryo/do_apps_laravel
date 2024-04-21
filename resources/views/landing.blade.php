@extends('layouts.app')

@section('content')
    <h1>Our Products</h1>
    <div class="product-list">
        @foreach ($products as $product)
            <div class="product">
                <a href="{{ route('product.detail', $product->id) }}">
                    <img src="{{ $product->fileimages }}" alt="{{ $product->product_name }}" width="200">
                    <h3>{{ $product->product_name }}</h3>
                </a>
            </div>
        @endforeach
    </div>
    </section>
@endsection

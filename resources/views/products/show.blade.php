<!-- resources/views/products/show.blade.php -->

<h1>Product Details</h1>

<p><strong>ID:</strong> {{ $product->id }}</p>
<p><strong>SKU:</strong> {{ $product->sku }}</p>
<!-- Add fields for other product attributes as needed -->

<a href="{{ route('products.index') }}">Back to List</a>

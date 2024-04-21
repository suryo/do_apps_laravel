<!-- resources/views/products/edit.blade.php -->

<h1>Edit Product</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="sku">SKU:</label>
    <input type="text" id="sku" name="sku" value="{{ $product->sku }}">

    <!-- Add fields for other product attributes as needed -->

    <button type="submit">Update Product</button>
</form>

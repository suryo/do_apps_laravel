<!-- resources/views/products/create.blade.php -->

<h1>Create New Product</h1>

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <label for="sku">SKU:</label>
    <input type="text" id="sku" name="sku">

    <!-- Add fields for other product attributes as needed -->

    <button type="submit">Create Product</button>
</form>

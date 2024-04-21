<!-- resources/views/brands/create.blade.php -->

<h1>Create New Brand</h1>

<form action="{{ route('brands.store') }}" method="POST">
    @csrf
    <label for="product_brand">Brand Name:</label>
    <input type="text" id="product_brand" name="product_brand">

    <label for="status">Status:</label>
    <input type="text" id="status" name="status">

    <button type="submit">Create Brand</button>
</form>

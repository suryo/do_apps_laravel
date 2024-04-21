<!-- resources/views/product_categories/create.blade.php -->

<h1>Create New Product Category</h1>

<form action="{{ route('product-categories.store') }}" method="POST">
    @csrf
    <label for="product_category_name">Category Name:</label>
    <input type="text" id="product_category_name" name="product_category_name">

    <label for="status">Status:</label>
    <input type="text" id="status" name="status">

    <button type="submit">Create Product Category</button>
</form>

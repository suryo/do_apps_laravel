<!-- resources/views/product_categories/edit.blade.php -->

<h1>Edit Product Category</h1>

<form action="{{ route('product-categories.update', $productCategory->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="product_category_name">Category Name:</label>
    <input type="text" id="product_category_name" name="product_category_name" value="{{ $productCategory->product_category_name }}">

    <label for="status">Status:</label>
    <input type="text" id="status" name="status" value="{{ $productCategory->status }}">

    <button type="submit">Update Product Category</button>
</form>

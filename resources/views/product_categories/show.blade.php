<!-- resources/views/product_categories/show.blade.php -->

<h1>Product Category Details</h1>

<p><strong>ID:</strong> {{ $productCategory->id }}</p>
<p><strong>Name:</strong> {{ $productCategory->product_category_name }}</p>
<p><strong>Status:</strong> {{ $productCategory->status }}</p>

<a href="{{ route('product-categories.index') }}">Back to List</a>

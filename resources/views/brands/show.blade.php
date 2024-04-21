<!-- resources/views/brands/show.blade.php -->

<h1>Brand Details</h1>

<p><strong>ID:</strong> {{ $brand->id }}</p>
<p><strong>Name:</strong> {{ $brand->product_brand }}</p>
<p><strong>Status:</strong> {{ $brand->status }}</p>

<a href="{{ route('brands.index') }}">Back to List</a>

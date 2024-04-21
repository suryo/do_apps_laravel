<!-- resources/views/products/index.blade.php -->

<h1>List of Products</h1>

<a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>SKU</th>
            <th>Category</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->sku }}</td>
            <td>{{ $product->product_category }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->product_brand }}</td>
            <td>{{ $product->product_price }}</td>
            <td>{{ $product->status }}</td>
            <td>
                <a href="{{ route('products.show', $product->id) }}">View</a>
                <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

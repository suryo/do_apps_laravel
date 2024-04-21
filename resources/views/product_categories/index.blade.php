<!-- resources/views/product_categories/index.blade.php -->

<h1>List of Product Categories</h1>

<a href="{{ route('product-categories.create') }}" class="btn btn-primary">Add Product Category</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productCategories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->product_category_name }}</td>
            <td>{{ $category->status }}</td>
            <td>
                <a href="{{ route('product-categories.show', $category->id) }}">View</a>
                <a href="{{ route('product-categories.edit', $category->id) }}">Edit</a>
                <form action="{{ route('product-categories.destroy', $category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

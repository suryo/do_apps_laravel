<!-- resources/views/brands/index.blade.php -->

<h1>List of Brands</h1>

<a href="{{ route('brands.create') }}" class="btn btn-primary">Add Brand</a>

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
        @foreach($brands as $brand)
        <tr>
            <td>{{ $brand->id }}</td>
            <td>{{ $brand->product_brand }}</td>
            <td>{{ $brand->status }}</td>
            <td>
                <a href="{{ route('brands.show', $brand->id) }}">View</a>
                <a href="{{ route('brands.edit', $brand->id) }}">Edit</a>
                <form action="{{ route('brands.destroy', $brand->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

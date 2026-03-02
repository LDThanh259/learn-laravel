@extends('layout.admin')

@section('content')
<div class="container">
    <h1>Category List</h1>
    <a href="{{ route('category.create') }}" class="btn btn-primary">Add New Category</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Parent</th>
                <th>Image</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->parent ? $category->parent->name : 'None' }}</td>
                <td><img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" width="50"></td>
                <td>{{ $category->is_active ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@extends('layout.admin')

@section('content')
<div class="container">
    <h1>Add New Category</h1>
    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="parent_id">Parent Category</label>
            <select name="parent_id" class="form-control">
                <option value="">None</option>
                @foreach ($categories as $parent)
                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="is_active">Active</label>
            <input type="checkbox" name="is_active" value="1" checked>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
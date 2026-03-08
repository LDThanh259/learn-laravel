<h1>Create Product</h1>

<form method="POST" action="{{ route('product.store') }}">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}">
    @error('name')<p>{{ $message }}</p>@enderror

    <label for="price">Price:</label>
    <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01">
    @error('price')<p>{{ $message }}</p>@enderror

    <label for="sale_price">Sale Price:</label>
    <input type="number" name="sale_price" id="sale_price" value="{{ old('sale_price') }}" step="0.01">
    @error('sale_price')<p>{{ $message }}</p>@enderror

    <label for="stock">Stock:</label>
    <input type="number" name="stock" id="stock" value="{{ old('stock') }}">
    @error('stock')<p>{{ $message }}</p>@enderror

    <label for="category_id">Category:</label>
    <select name="category_id" id="category_id">
        <option value="">Select Category</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category_id')<p>{{ $message }}</p>@enderror

    <button type="submit">Create</button>
</form>
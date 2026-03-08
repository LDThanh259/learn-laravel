@extends('layout.admin')
@section('title', 'Danh sách sản phẩm')

@section('content')
<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">Danh sách sản phẩm</h3>
        <div class="card-tools">
            <a href="{{ route('product.add') }}" class="btn btn-primary btn-sm">Thêm sản phẩm</a>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('product.index') }}" method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="keyword" class="form-control" placeholder="Tìm theo tên..." value="{{ request('keyword') }}">
                </div>
                <div class="col-md-4">
                    <select name="category_id" class="form-control">
                        <option value="">Tất cả danh mục</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-secondary">Lọc</button>
                    <a href="{{ route('product.index') }}" class="btn btn-default border">Xóa lọc</a>
                </div>
            </div>
        </form>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Danh mục</th>
                    <th>Tên SP</th>
                    <th>Giá</th>
                    <th>Tồn kho</th>
                    <th>Ảnh</th>
                    <th>Hoạt động</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->category ? $product->category->name : 'Không có' }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        {{ number_format($product->price) }} VND
                        @if ($product->sale_price)
                            <br><small class="text-danger">KM: {{ number_format($product->sale_price) }} VND</small>
                        @endif
                    </td>
                    <td>{{ number_format($product->stock) }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
                    </td>
                    <td>
                        <span class="badge {{ $product->is_active ? 'badge-success' : 'badge-danger' }}">
                            {{ $product->is_active ? 'Có' : 'Không' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Không có sản phẩm nào</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="mt-3">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
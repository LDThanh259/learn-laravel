@extends('layout.admin')
@section('title', 'Thêm sản phẩm')

@section('content')
<div class="card mt-3">
    <div class="card-header">
        <h3 class="card-title">Thêm sản phẩm mới</h3>
        <div class="card-tools">
            <a href="{{ route('product.index') }}" class="btn btn-secondary btn-sm">Quay lại</a>
        </div>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tên sản phẩm <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mã sản phẩm (SKU)</label>
                        <input type="text" name="sku" class="form-control" value="{{ old('sku') }}">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select name="category_id" class="form-control">
                            <option value="">Chọn danh mục</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Số lượng tồn kho <span class="text-danger">*</span></label>
                        <input type="number" name="stock" class="form-control" value="{{ old('stock', 0) }}" min="0" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Giá <span class="text-danger">*</span></label>
                        <input type="number" name="price" class="form-control" value="{{ old('price', 0) }}" min="0" step="1" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Giá khuyến mãi (<= Giá)</label>
                        <input type="number" name="sale_price" class="form-control" value="{{ old('sale_price') }}" min="0" step="1">
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Đường dẫn hình ảnh</label>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="isActiveSwitch" name="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="isActiveSwitch">Kích hoạt (Hiển thị sản phẩm)</label>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
        </form>
    </div>
</div>
@endsection
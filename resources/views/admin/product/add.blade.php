@extends('layout.admin')
@section('content')
<a href="{{ route('product.index') }}" class="btn btn-secondary mt-2 mb-2">Back to List</a>
<h1>Thêm sản phẩm</h1>

<form action="{{ route('product.store') }}" method="POST">
    @csrf
    <input type="text" placeholder="Tên sản phẩm" name="name"><br><br>
    <input type="number" placeholder="Giá" name="price"><br><br>
    <input type="number" placeholder="Số lượng tồn kho" name="stock"><br><br>
    <button type="submit">Lưu</button>
</form>
@endsection
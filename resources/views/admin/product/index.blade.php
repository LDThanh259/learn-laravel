@extends('layout.admin')
@section('title', 'Danh sách sản phẩm')

@section('content')
<h1>{{ $title }}</h1>

<a href="{{ route('product.add') }}" class="btn btn-primary mb-3">Thêm sản phẩm</a>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td><a href="{{ route('product.detail', $product['id']) }}">{{ $product['id'] }}</a></td>
            <td>{{ $product['name'] }}</td>
            <td>{{ number_format($product['price']) }} VND</td>
            <td>{{ number_format($product['stock']) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
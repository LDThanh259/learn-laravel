<h1>Danh sách sản phẩm</h1>

<a href="{{ route('product.add') }}">Thêm sản phẩm</a>

<ul>
    @foreach ($products as $product)
    <li>
        {{ $product['name'] }} - {{ number_format($product['price']) }} VND
    </li>
    @endforeach
</ul>
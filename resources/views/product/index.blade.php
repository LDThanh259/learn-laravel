<h1>{{ $title }}</h1>

<a href="{{ route('product.add') }}">Thêm sản phẩm</a>

<ul>
    @foreach ($products as $product)
    <li>
        <a href="{{ route('product.detail', ['id' => $product['id']]) }}">{{ $product['name'] }}</a> - {{ number_format($product['price']) }} VND
    </li>
    @endforeach
</ul>
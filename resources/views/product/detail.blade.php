<p>{{ $product['id'] }} - {{ $product['name'] }} - {{ $product['price'] }}VND - {{ $product['stock'] }} sản phẩm</p>

<form action="{{ route('product.update', ['id' => $product['id']]) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" placeholder="Tên sản phẩm" name="name" value="{{ $product['name'] }}"><br><br>
    <input type="number" placeholder="Giá" name="price" value="{{ $product['price'] }}"><br><br>
    <input type="number" placeholder="Số lượng tồn kho" name="stock" value="{{ $product['stock'] }}"><br><br>
    <button type="submit">Cập nhật</button>
</form>

<form action="{{ route('product.destroy', ['id' => $product['id']]) }}" method="POST" style="margin-top: 20px;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
    @csrf
    @method('DELETE')
    <button type="submit" style="background-color: red; color: white;">Xóa sản phẩm</button>
</form>
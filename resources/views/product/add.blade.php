<h1>Thêm sản phẩm</h1>

<form action="{{ route('product.store') }}" method="POST">
    @csrf
    <input type="text" placeholder="Tên sản phẩm" name="name"><br><br>
    <input type="number" placeholder="Giá" name="price"><br><br>
    <button type="submit">Lưu</button>
</form>
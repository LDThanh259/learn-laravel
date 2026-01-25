<form action=" {{ route('checkLogin') }} " method="POST">
    @csrf    
    <input type="text" placeholder="name" name="name">
    <input type="text" placeholder="mssv" name="mssv">
    <input type="submit">
</form> 
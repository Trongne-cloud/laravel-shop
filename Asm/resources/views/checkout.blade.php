<!DOCTYPE html>
<html>
<head>
    <title>Thanh toán</title>
</head>
<body>
    <h1>Thông tin đặt hàng</h1>
    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <label>Họ tên:</label><br>
        <input type="text" name="name" required><br><br>
        <label>Số điện thoại:</label><br>
        <input type="text" name="phone" required><br><br>
        <label>Địa chỉ:</label><br>
        <textarea name="address" required></textarea><br><br>
        <button type="submit">Đặt hàng</button>
    </form>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Cảm ơn</title>
    <script>
        function goHome() {
            window.location.href = "{{ route('home') }}";
        }
    </script>
</head>
<body>
    <h1>Cảm ơn bạn đã đặt hàng!</h1>
    <p>Đơn hàng của bạn đã được ghi nhận.</p>
    <button onclick="goHome()">OK</button>
</body>
</html>
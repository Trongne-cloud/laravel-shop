<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Shop Laravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    {{-- Header --}}
    @include('layouts.header')
     <!-- Đoạn code hiển thị giỏ hàng -->
            @php 
                $cartCount = array_sum(array_column(session()->get('cart', []), 'quantity')); 
            @endphp
            <a href="{{ route('cart.index') }}">🛒 Giỏ hàng ({{ $cartCount }})</a>
    {{-- Nội dung --}}
    <main class="container my-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.footer')

</body>
</html>
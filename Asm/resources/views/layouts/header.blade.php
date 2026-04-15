<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">🛒 Shop</a>

        <div>
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/">Trang chủ</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/products">Sản phẩm</a>
                </li>

                @auth
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-link nav-link">Đăng xuất</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Đăng nhập</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/register">Đăng ký</a>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
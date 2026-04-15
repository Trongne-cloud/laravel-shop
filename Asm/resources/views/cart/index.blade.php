<h1 class="text-center mb-4">🛒 Giỏ hàng của bạn</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(!empty($cart))
<div class="container">

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>
                @php $total = 0; @endphp

                @foreach($cart as $id => $item)
                    @php 
                        $subtotal = $item['price'] * $item['quantity']; 
                        $total += $subtotal; 
                    @endphp

                    <tr>
                        <td class="fw-semibold">{{ $item['name'] }}</td>

                        <td>{{ number_format($item['price']) }} VNĐ</td>

                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex justify-content-center gap-2">
                                @csrf
                                @method('PUT')

                                <input type="number"
                                       name="quantity"
                                       value="{{ $item['quantity'] }}"
                                       min="1"
                                       class="form-control form-control-sm"
                                       style="width: 70px;">

                                <button class="btn btn-sm btn-warning">
                                    Cập nhật
                                </button>
                            </form>
                        </td>

                        <td class="text-success fw-bold">
                            {{ number_format($subtotal) }} VNĐ
                        </td>

                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger">
                                    Xoá
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr class="table-secondary">
                    <td colspan="3" class="text-end fw-bold">Tổng cộng:</td>
                    <td class="fw-bold text-primary">
                        {{ number_format($total) }} VNĐ
                    </td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="d-flex justify-content-between mt-4">

        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            @method('DELETE')

            <button class="btn btn-outline-danger">
                 Xoá toàn bộ giỏ hàng
            </button>
        </form>

        <div>
            @if(!empty($cart))
                <a href="{{ route('checkout.index') }}" class="btn btn-success">
                     Mua hàng
                </a>
            @endif

            <a href="{{ route('products.index') }}" class="btn btn-primary">
                Tiếp tục mua sắm
            </a>
        </div>

    </div>
</div>

@else
    <div class="alert alert-info text-center">
        Giỏ hàng của bạn đang trống 
    </div>

    <div class="text-center">
        <a href="{{ route('products.index') }}" class="btn btn-primary">
            Quay lại mua sắm
        </a>
    </div>
@endif
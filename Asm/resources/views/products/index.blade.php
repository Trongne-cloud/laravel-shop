@foreach($products as $product)
    <div>
        <h3>{{ $product->name }}</h3>
        <p>{{ number_format($product->price) }} VNĐ</p>
        <form action="{{ route('cart.add', $product->id) }}" method="POST">
            @csrf
            <button type="submit">Thêm vào giỏ</button>
        </form>
    </div>
@endforeach
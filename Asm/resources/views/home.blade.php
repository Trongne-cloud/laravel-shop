@extends('layouts.app')

@section('content')
<h2>Sản phẩm</h2>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="row">
@foreach($products as $product)
    <div class="col-md-3">
        <div class="card p-2 mb-3">
            <h5>{{ $product->name }}</h5>
            <p>{{ $product->price }} VND</p>

            @auth
                <form action="{{ route('order.store', $product->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-success">Mua hàng</button>
                </form>
            @endauth

            @guest
                <a href="/login" class="btn btn-primary">Đăng nhập để mua</a>
            @endguest

        </div>
    </div>
@endforeach
</div>
@endsection
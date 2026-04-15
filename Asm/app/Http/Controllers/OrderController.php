<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store($id)
    {
        // Lấy sản phẩm
        $product = Product::findOrFail($id);
        
        // Lấy giỏ hàng hiện tại từ session
        $cart = session()->get('cart', []);
        
        // Thêm sản phẩm vào giỏ
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }
        
        // Lưu lại session
        session()->put('cart', $cart);
        
        // Chuyển hướng về trang giỏ hàng
        return redirect()->route('cart.index')->with('success', 'Đã thêm sản phẩm vào giỏ!');
    }
}
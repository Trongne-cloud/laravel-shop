<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // lấy tất cả sản phẩm
        return view('home', compact('products')); // trả về view home.blade.php
    }
}
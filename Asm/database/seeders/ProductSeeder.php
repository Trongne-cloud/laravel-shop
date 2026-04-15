<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;  // THÊM DÒNG NÀY

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create(['name' => 'Áo thun', 'price' => 150000, 'stock' => 10]);
        Product::create(['name' => 'Quần jean', 'price' => 350000, 'stock' => 5]);
    }
}
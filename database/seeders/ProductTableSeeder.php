<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Database\Seeders\ProductTableSeeder;

class ProductTableSeeder extends Seeder
{
    
    public function run()
    {
        
        DB::table('products')->delete();

        $product1 = Product::create([
            'name' => 'T-shirt',
            'country' => 'US',
            'price' => 30.99,
            'weight' => 0.2,
            'rate' => 2,
        ]);

        $product2 = Product::create([
            'name' => 'Blouse',
            'country' => 'UK',
            'price' => 10.99,
            'weight' => 0.3,
            'rate' => 3,
        ]);

        $product3 = Product::create([
            'name' => 'Pants',
            'country' => 'UK',
            'price' => 64.99,
            'weight' => 0.9,
            'rate' => 3,
        ]);

        $product4 = Product::create([
            'name' => 'Sweatpants',
            'country' => 'CN',
            'price' => 84.99,
            'weight' => 1.1,
            'rate' => 2,
        ]);

        $product5 = Product::create([
            'name' => 'Jacket',
            'country' => 'US',
            'price' => 199.99,
            'weight' => 2.2,
            'rate' => 2,
        ]);

        $product6 = Product::create([
            'name' => 'Shoes',
            'country' => 'CN',
            'price' => 79.99,
            'weight' => 1.3,
            'rate' => 2,
        ]);

    }
}

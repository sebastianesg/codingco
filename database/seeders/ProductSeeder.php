<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Producto 1',
            'description' => 'Descripción del producto 1',
            'price' => 10.0,
        ]);

        Product::create([
            'name' => 'Producto 2',
            'description' => 'Descripción del producto 2',
            'price' => 20.0,
        ]);

        Product::create([
            'name' => 'Producto 3',
            'description' => 'Descripción del producto 3',
            'price' => 30.0,
        ]);
    }
}

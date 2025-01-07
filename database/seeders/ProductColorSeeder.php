<?php

namespace Database\Seeders;

use App\Models\ProductColor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products_color = [
            ['product_id' => '1', 'color_id' => '1',  'additional_price' => '3'],
            ['product_id' => '2', 'color_id' => '1',  'additional_price' => '3'],
        ];

        // Insert each size into the database
        foreach ($products_color as $product) {
            ProductColor::create($product);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\ProductSize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $product_size = [
            ['product_id' => '1', 'size_id' => '1',  'additional_price' => '3'],
            ['product_id' => '2', 'size_id' => '1',  'additional_price' => '3'],
        ];

        // Insert each size into the database
        foreach ($product_size as $product) {
            ProductSize::create($product);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // List of sizes to add
        $products = [
            ['name' => 'T-shirt', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin faucibus lectus tellus, vel consectetur nisi dapibus eget. Fusce commodo at nisl eu lacinia. Sed tincidunt magna id ultrices dictum.',  'category_id' => '3','base_price' => '10'],
            ['name' => 'crop top', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin faucibus lectus tellus, vel consectetur nisi dapibus eget. Fusce commodo at nisl eu lacinia. Sed tincidunt magna id ultrices dictum.', 'category_id' => '4','discount' => '10','base_price' => '20'],
        ];

        // Insert each size into the database
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

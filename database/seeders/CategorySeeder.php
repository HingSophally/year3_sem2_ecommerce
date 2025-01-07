<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // List of sizes to add
        $categories = [
            ['name' => 'men','description' => 'this is man decription'],
            ['name' => 'women','description' => 'this is wonman decription'],

            ['name' => 'shirt','description' => 'clothes for man','parent_id'=>'1'],

            ['name' => 'dress','description' => 'clothes for woman','parent_id'=>'2'],
        ];

        // Insert each size into the database
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

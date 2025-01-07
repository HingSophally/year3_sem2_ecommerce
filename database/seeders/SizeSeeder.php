<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // List of sizes to add
        $sizes = [
            ['size' => 'Small'],
            ['size' => 'Medium'],
            ['size' => 'Large'],
            ['size' => 'Extra Large'],
            ['size' => 'XXL'],
        ];

        // Insert each size into the database
        foreach ($sizes as $size) {
            Size::create($size);
        }
    }
}

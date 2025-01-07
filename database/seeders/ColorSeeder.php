<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // List of colors to add
        $colors = [
            ['color' => 'red'],
            ['color' => 'blue'],
            ['color' => 'green'],
            ['color' => 'grey'],
            ['color' => 'black'],
        ];

        // Insert each color into the database
        foreach ($colors as $color) {
            Color::create($color);
        }
    }
}

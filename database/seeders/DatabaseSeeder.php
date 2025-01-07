<?php

namespace Database\Seeders;

use App\Http\Controllers\CouponController;
use App\Models\Category;
use App\Models\ProductColor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\CategorySeeder;
use App\Models\ProductVariant;
use Database\Seeders\ImageSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(ProductColorSeeder::class);
        $this->call(ProductSizeSeeder::class);
        $this->call(CouponSeeder::class);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // User admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@local.com',
            'email_verified_at' => "2024-05-13 07:03:31",
            'password' => Hash::make('12345678'),
            'is_admin' => 1
        ]);

        // User normal
        User::factory()->create([
            'name' => 'user normal',
            'email' => 'user@gmail.com',
            'email_verified_at' => "2024-05-13 07:03:31",
            'password' => Hash::make('12345678'),
            'is_admin' => 0
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $coupons = [
            [
                'code' => 'SAVE10',
                'description' => '10% off your purchase',
                'discount_type' => 'percentage',
                'discount_value' => 10,
                'min_purchase' => 50.00,
                'expiration_date' => Carbon::create('2025', '12', '31'),
                'usage_limit' => 100,
                'used_count' => 0,
                'is_active' => true
            ],
            [
                'code' => 'FREESHIP',
                'description' => 'Free shipping on orders over $100',
                'discount_type' => 'free_shipping',
                'discount_value' => 0,
                'min_purchase' => 100.00,
                'expiration_date' => Carbon::create('2025', '11', '30'),
                'usage_limit' => 200,
                'used_count' => 0,
                'is_active' => true
            ],
            [
                'code' => 'SUMMER15',
                'description' => '$15 off orders over $75',
                'discount_type' => 'fixed',
                'discount_value' => 15.00,
                'min_purchase' => 75.00,
                'expiration_date' => Carbon::create('2025', '08', '01'),
                'usage_limit' => 50,
                'used_count' => 0,
                'is_active' => true
            ],
            [
                'code' => 'BLACKFRIDAY',
                'description' => '50% off all items on Black Friday',
                'discount_type' => 'percentage',
                'discount_value' => 50,
                'min_purchase' => 0,
                'expiration_date' => Carbon::create('2025', '11', '29'),
                'usage_limit' => 100,
                'used_count' => 0,
                'is_active' => true
            ],
            [
                'code' => 'OUMTUKFESTIVAL',
                'description' => '30% off all items on Oumtuk Festival',
                'discount_type' => 'percentage',
                'discount_value' => 30,
                'min_purchase' => 0,
                'expiration_date' => Carbon::create('2025', '11', '17'),
                'usage_limit' => 100,
                'used_count' => 0,
                'is_active' => true
            ]
        ];

        // Insert the coupons into the database
        foreach ($coupons as $coupon) {
            Coupon::create($coupon);
        }
    }
}

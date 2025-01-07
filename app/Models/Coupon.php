<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Coupon extends Model
{
    //
    use HasFactory;
    protected $table = 'coupons';
    protected $fillable = [
        'code', 'description', 'discount_type', 'discount_value', 'min_purchase',
        'expiration_date', 'usage_limit', 'used_count', 'is_active'
    ];

    // Check if the coupon is valid based on its expiration date and usage limit
    public function isValid()
    {
        return $this->is_active &&
            $this->expiration_date >= Carbon::today() &&
            ($this->usage_limit === null || $this->used_count < $this->usage_limit);
    }
}

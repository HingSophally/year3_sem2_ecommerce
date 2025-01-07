<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id', // Add this line
        'product_id',
        'productcolor_id',
        'productsize_id',
        'quantity',
        'price',
        'final_price',
        // Add any other fields that should be mass assignable
    ];
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function productColor(): BelongsTo
    {
        return $this->belongsTo(ProductColor::class, 'productcolor_id');
    }

    public function productSize(): BelongsTo
    {
        return $this->belongsTo(ProductSize::class, 'productsize_id');
    }
}

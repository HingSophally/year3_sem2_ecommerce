<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSize extends Model
{
    //
    use HasFactory;

    protected $table = 'productsize';
    protected $fillable = ['product_id', 'size_id', 'additional_price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class); // Adjust if you have a Size model
    }
}

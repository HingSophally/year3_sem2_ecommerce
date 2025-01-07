<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductColor extends Model
{
    use HasFactory;

    protected $table = 'productcolor';
    //
    protected $fillable = ['product_id', 'color_id', 'additional_price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class); // Adjust if you have a Color model
    }
    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }
}

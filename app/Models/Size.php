<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table = 'sizes';
    protected $fillable = [
        'size',
        // 'productVariant_id',
    ];
    public function productSizes()
    {
        return $this->hasMany(ProductSize::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory;
    protected $table = 'colors';
    protected $fillable = [
        'color',
        // 'productVariant_id',
    ];
    public function productColors()
    {
        return $this->hasMany(ProductColor::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'code',
        'type',
        'value',
        'kind',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'discount_product');
    }
    
}

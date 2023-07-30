<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grinding extends Model
{
    protected $fillable = ['name', 'usage_information'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_variants', 'grinding_id', 'product_id');
    }
}

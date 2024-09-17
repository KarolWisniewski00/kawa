<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DiscountProduct extends Pivot
{
    protected $table = 'discount_products';

    protected $fillable = [
        'discount_id',
        'product_id',
    ];
}

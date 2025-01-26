<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'seo_title',
        'order',
        'view',
        'busket',
        'sell',
        'coffee',
        'tool',
        'lemon',
        'height',
        'seo_description',
        'visibility_in_google',
        'visibility_on_website',
        'photo_second',
        'view_type',
        'price_simple',
        'size_simple',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
    public function discounts()
    {
        return $this->belongsToMany(Discount::class, 'discount_product');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }
}

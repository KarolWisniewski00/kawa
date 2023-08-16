<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'photo', 'start', 'content', 'end', 'order', 'visibility_on_website', 'seo_title', 'seo_description', 'seo_keywards', 'visibility_in_google'
    ];
}

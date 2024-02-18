<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'photo', 'start', 'content', 'end', 'order', 'visibility_on_website', 'seo_title', 'seo_description', 'seo_keywards', 'visibility_in_google',
        'content_photo_1',
        'content_photo_2',
        'content_text_1',
        'content_text_2',
        'content_text_3',
        'content_text_4',
        'content_text_5',
        'content_text_6',
        'content_text_7',
        'content_text_8',
        'type',
    ];
}

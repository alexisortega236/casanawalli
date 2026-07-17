<?php

namespace App\Models;

use Database\Factories\BlogPostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    /** @use HasFactory<BlogPostFactory> */
    use HasFactory;

    protected $fillable = [
        'slug',
        'title_es',
        'title_en',
        'excerpt_es',
        'excerpt_en',
        'body_es',
        'body_en',
        'featured_image',
        'published_at',
        'is_active',
        'sort_order',
        'seo_title_es',
        'seo_title_en',
        'seo_description_es',
        'seo_description_en',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }
}

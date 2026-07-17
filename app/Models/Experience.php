<?php

namespace App\Models;

use Database\Factories\ExperienceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    /** @use HasFactory<ExperienceFactory> */
    use HasFactory;

    protected $fillable = [
        'slug',
        'name_es',
        'name_en',
        'subtitle_es',
        'subtitle_en',
        'description_es',
        'description_en',
        'image',
        'gallery',
        'external_url',
        'cta_label_es',
        'cta_label_en',
        'is_featured',
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
            'gallery' => 'array',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ];
    }
}

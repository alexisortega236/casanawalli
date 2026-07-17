<?php

namespace App\Models;

use Database\Factories\PlazaBusinessFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlazaBusiness extends Model
{
    /** @use HasFactory<PlazaBusinessFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'description_es',
        'description_en',
        'logo',
        'image',
        'instagram_url',
        'website_url',
        'location',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}

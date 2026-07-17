<?php

namespace App\Models;

use Database\Factories\PackageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    /** @use HasFactory<PackageFactory> */
    use HasFactory;

    protected $fillable = [
        'slug',
        'name_es',
        'name_en',
        'description_es',
        'description_en',
        'includes_es',
        'includes_en',
        'price_note_es',
        'price_note_en',
        'image',
        'external_url',
        'cta_label_es',
        'cta_label_en',
        'valid_from',
        'valid_until',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'valid_from' => 'date',
            'valid_until' => 'date',
            'is_active' => 'boolean',
        ];
    }
}

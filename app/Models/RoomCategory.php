<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    /** @use HasFactory<\Database\Factories\RoomCategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'slug',
        'name_es',
        'name_en',
        'description_es',
        'description_en',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}

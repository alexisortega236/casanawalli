<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory;

    protected $fillable = [
        'room_category_id',
        'slug',
        'name_es',
        'name_en',
        'subtitle_es',
        'subtitle_en',
        'description_es',
        'description_en',
        'capacity',
        'bed_type',
        'room_type',
        'location_description',
        'featured_image',
        'is_featured',
        'is_active',
        'sort_order',
        'booking_url',
        'whatsapp_message',
        'seo_title_es',
        'seo_title_en',
        'seo_description_es',
        'seo_description_en',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'capacity' => 'integer',
        ];
    }

    public function category()
    {
        return $this->belongsTo(RoomCategory::class, 'room_category_id');
    }

    public function images()
    {
        return $this->hasMany(RoomImage::class)->orderBy('sort_order');
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class)->where('is_active', true);
    }
}

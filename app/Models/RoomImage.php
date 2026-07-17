<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomImage extends Model
{
    /** @use HasFactory<\Database\Factories\RoomImageFactory> */
    use HasFactory;

    protected $fillable = [
        'room_id',
        'image',
        'alt_es',
        'alt_en',
        'sort_order',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}

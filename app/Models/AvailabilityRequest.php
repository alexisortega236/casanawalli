<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailabilityRequest extends Model
{
    /** @use HasFactory<\Database\Factories\AvailabilityRequestFactory> */
    use HasFactory;

    protected $fillable = [
        'room_id',
        'name',
        'email',
        'phone',
        'arrival_date',
        'departure_date',
        'guests',
        'message',
        'locale',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'arrival_date' => 'date',
            'departure_date' => 'date',
            'guests' => 'integer',
        ];
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    /** @use HasFactory<\Database\Factories\SiteSettingFactory> */
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'group',
    ];

    public static function value(string $key, ?string $default = null): ?string
    {
        return static::query()->where('key', $key)->value('value') ?? $default;
    }
}

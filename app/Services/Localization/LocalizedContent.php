<?php

namespace App\Services\Localization;

use Illuminate\Database\Eloquent\Model;

class LocalizedContent
{
    public function get(Model|array $source, string $field, ?string $locale = null): ?string
    {
        $locale ??= app()->getLocale();
        $key = "{$field}_{$locale}";

        if ($source instanceof Model) {
            return $source->getAttribute($key) ?: $source->getAttribute("{$field}_en") ?: $source->getAttribute("{$field}_es");
        }

        return $source[$key] ?? $source["{$field}_en"] ?? $source["{$field}_es"] ?? null;
    }
}

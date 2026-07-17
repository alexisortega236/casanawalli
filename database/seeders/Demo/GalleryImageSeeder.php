<?php

namespace Database\Seeders\Demo;

use App\Models\GalleryImage;
use Illuminate\Database\Seeder;

class GalleryImageSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            ['/assets/current-site/hero-garden-pool.webp', 'garden', 'Casa Nawalli garden and pool'],
            ['/assets/current-site/lifestyle-breakfast.webp', 'breakfast', 'Breakfast at Casa Nawalli'],
            ['/assets/current-site/lifestyle-livingroom.webp', 'spaces', 'Main house living room'],
            ['/assets/current-site/lifestyle-garden.webp', 'garden', 'Tropical garden detail'],
            ['/assets/current-site/lifestyle-pool.webp', 'pool', 'Pool area'],
            ['/assets/current-site/amenity-responsible.webp', 'responsible-travel', 'Responsible travel at Casa Nawalli'],
            ['/assets/current-site/amenity-edible-garden.webp', 'garden', 'Edible tropical garden'],
            ['/assets/current-site/room-oasis.webp', 'suites', 'Suite detail'],
            ['/assets/current-site/room-infinite.webp', 'suites', 'Suite interior'],
            ['/assets/current-site/room-naaliwa.webp', 'suites', 'Tate Naaliwa suite'],
        ];

        foreach ($images as $index => [$image, $category, $alt]) {
            GalleryImage::query()->updateOrCreate(
                ['image' => $image],
                [
                    'category' => $category,
                    'alt_es' => $alt,
                    'alt_en' => $alt,
                    'is_featured' => $index < 4,
                    'is_active' => true,
                    'sort_order' => $index + 1,
                ]
            );
        }
    }
}

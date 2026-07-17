<?php

namespace Database\Seeders\Demo;

use App\Models\GalleryImage;
use Illuminate\Database\Seeder;

class GalleryImageSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            ['https://nawallisayulita.com/wp-content/uploads/2023/10/casa-nawalli-sayulita-gal-4.webp', 'garden', 'Casa Nawalli garden and pool'],
            ['https://nawallisayulita.com/wp-content/uploads/2023/09/home-lifestyle-1.webp', 'breakfast', 'Breakfast at Casa Nawalli'],
            ['https://nawallisayulita.com/wp-content/uploads/2023/09/home-lifestyle-2.webp', 'spaces', 'Main house living room'],
            ['https://nawallisayulita.com/wp-content/uploads/2023/09/home-lifestyle-3.webp', 'garden', 'Tropical garden detail'],
            ['https://nawallisayulita.com/wp-content/uploads/2023/09/home-lifestyle-4.webp', 'pool', 'Pool area'],
            ['https://nawallisayulita.com/wp-content/uploads/2023/09/amenities-lifestyle-3.webp', 'responsible-travel', 'Responsible travel at Casa Nawalli'],
            ['https://nawallisayulita.com/wp-content/uploads/2023/09/amenities-lifestyle-6.webp', 'garden', 'Edible tropical garden'],
            ['https://nawallisayulita.com/wp-content/uploads/2023/08/hotel-boutique-in-sayulita-2.webp', 'suites', 'Suite detail'],
            ['https://nawallisayulita.com/wp-content/uploads/2023/08/hotel-boutique-in-sayulita-6.webp', 'suites', 'Suite interior'],
            ['https://nawallisayulita.com/wp-content/uploads/2023/09/suite-naaliwa-scaled.webp', 'suites', 'Tate Naaliwa suite'],
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

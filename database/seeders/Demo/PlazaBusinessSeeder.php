<?php

namespace Database\Seeders\Demo;

use App\Models\PlazaBusiness;
use Illuminate\Database\Seeder;

class PlazaBusinessSeeder extends Seeder
{
    public function run(): void
    {
        $businesses = [
            ['Alchemize House', 'Wellness', 'https://www.instagram.com/alchemizehouse/?img_index=3'],
            ['Artefakto', 'Boutique', 'https://www.instagram.com/artefakto/'],
            ['Marea Cafe', 'Cafe', 'https://www.instagram.com/marea.cafesayulita/'],
            ['Rollado Ice Cream Tacos', 'Dessert', 'https://www.instagram.com/rolladoicecream/'],
            ['Sayu Swirls', 'Dessert', 'https://www.instagram.com/sayuswirls/'],
            ['Casa Lvnae', 'Boutique', 'https://www.instagram.com/casalvnae/'],
            ['Sayulita Wines & Co.', 'Wine', 'https://www.instagram.com/sayulitawines/'],
            ['Stogies', 'Cigars', 'https://www.instagram.com/stogies_mx/'],
            ['Restore with Roberto', 'Massage and wellness', 'https://www.instagram.com/chiropracticsayulita/'],
        ];

        foreach ($businesses as $index => [$name, $category, $instagram]) {
            PlazaBusiness::query()->updateOrCreate(
                ['name' => $name],
                [
                    'category' => $category,
                    'description_es' => 'Negocio listado en el menu publico actual de Plaza Nawalli. Descripcion editorial pendiente de confirmacion.',
                    'description_en' => 'Business listed in the current public Plaza Nawalli menu. Editorial description pending confirmation.',
                    'instagram_url' => $instagram,
                    'location' => 'Plaza Nawalli, Sayulita',
                    'is_active' => true,
                    'sort_order' => $index + 1,
                ]
            );
        }
    }
}

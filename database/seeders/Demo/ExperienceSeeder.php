<?php

namespace Database\Seeders\Demo;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        $experiences = [
            [
                'slug' => 'heated-salt-water-pool',
                'name_es' => 'Piscina climatizada de agua salada',
                'name_en' => 'Heated salt water pool',
                'subtitle_es' => 'Piscina y pergola lounge',
                'subtitle_en' => 'Pool and pergola lounge',
                'description_es' => 'Las amenidades principales incluyen una piscina climatizada de agua salada de 323 sq ft. (30 sq. m), area para tomar el sol y una pergola lounge con bar, cocina, grill premium y estacion de cafe, equipada con mobiliario y accesorios de alta calidad.',
                'description_en' => 'The main amenities include a 323 sq ft. (30 sq. m) heated salt water pool with sun bathing area and a luscious pergola lounge with bar, kitchen, premium grill and coffee station, all equipped with top quality furniture and accessories.',
                'image' => '/assets/current-site/lifestyle-pool.webp',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'slug' => 'edible-tropical-gardens',
                'name_es' => 'Jardines tropicales comestibles',
                'name_en' => 'Edible tropical gardens',
                'subtitle_es' => 'Jardin vivo',
                'subtitle_en' => 'Living garden',
                'description_es' => 'Muchas especies del jardin tropical son comestibles, medicinales o utiles de forma sostenible: cranberry hibiscus, elderberries, moringa, mango, lotus, camote y variedades de platano.',
                'description_en' => 'Many species in the tropical gardens are edible, medicinal or sustainably useful: cranberry hibiscus, elderberries, moringa, mango, lotus, sweet potatoes and varieties of bananas.',
                'image' => '/assets/current-site/amenity-edible-garden.webp',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'slug' => 'main-house-living-room',
                'name_es' => 'Sala de la casa principal',
                'name_en' => 'Main house living room',
                'subtitle_es' => 'Biblioteca, cafe y espacio comun',
                'subtitle_en' => 'Library, coffee and shared space',
                'description_es' => 'La casa principal integra una sala acogedora con pequena biblioteca, coleccion antigua, estacion de cafe y te, cocina tradicional, recepcion, comedor y area de descanso.',
                'description_en' => 'The main house includes a cozy living room with a small library, antique collection, coffee and tea station, old-fashioned kitchen, reception desk, dining room and sitting area.',
                'image' => '/assets/current-site/lifestyle-livingroom.webp',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'slug' => 'responsible-travel-practices',
                'name_es' => 'Turismo responsable',
                'name_en' => 'Responsible travel practices',
                'subtitle_es' => 'Naturaleza y comunidad',
                'subtitle_en' => 'Nature and community',
                'description_es' => 'Casa Nawalli comunica politicas de turismo responsable y una mejora continua basada en estandares ISO-26000 de responsabilidad social.',
                'description_en' => 'Casa Nawalli communicates responsible travel policies and continuous improvement based on ISO-26000 standards for social responsibility.',
                'image' => '/assets/current-site/amenity-responsible.webp',
                'is_featured' => true,
                'sort_order' => 4,
            ],
            [
                'slug' => 'pickleball-and-wellness',
                'name_es' => 'Pickleball y wellness',
                'name_en' => 'Pickleball and wellness',
                'subtitle_es' => 'Club externo vinculado',
                'subtitle_en' => 'Linked external club',
                'description_es' => 'El menu actual enlaza Pickleball and Wellness y Pickleball Club hacia pickleballsayulita.com. Esta experiencia conserva ese enlace externo sin inventar programas ni tarifas.',
                'description_en' => 'The current menu links Pickleball and Wellness and Pickleball Club to pickleballsayulita.com. This experience preserves that external link without inventing programs or rates.',
                'image' => '/assets/current-site/palms-background.webp',
                'external_url' => 'https://pickleballsayulita.com',
                'cta_label_es' => 'Ver pickleball',
                'cta_label_en' => 'View pickleball',
                'sort_order' => 5,
            ],
            [
                'slug' => 'sushi-and-bar',
                'name_es' => 'Sushi & Bar',
                'name_en' => 'Sushi & Bar',
                'subtitle_es' => 'Henshin Sushi',
                'subtitle_en' => 'Henshin Sushi',
                'description_es' => 'El menu actual enlaza Sushi & Bar hacia Henshin Sushi. Se conserva como experiencia gastronomica externa vinculada a Casa Nawalli.',
                'description_en' => 'The current menu links Sushi & Bar to Henshin Sushi. It is preserved as an external gastronomy experience linked to Casa Nawalli.',
                'image' => '/assets/current-site/henshin-logo.webp',
                'external_url' => 'https://henshinsushi.com/',
                'cta_label_es' => 'Ver Henshin',
                'cta_label_en' => 'View Henshin',
                'sort_order' => 6,
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::query()->updateOrCreate(
                ['slug' => $experience['slug']],
                [
                    ...$experience,
                    'is_active' => true,
                    'seo_title_es' => $experience['name_es'].' | Casa Nawalli',
                    'seo_title_en' => $experience['name_en'].' | Casa Nawalli',
                    'seo_description_es' => $experience['description_es'],
                    'seo_description_en' => $experience['description_en'],
                ]
            );
        }
    }
}

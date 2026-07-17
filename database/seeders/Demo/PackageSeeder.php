<?php

namespace Database\Seeders\Demo;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            [
                'slug' => 'bed-and-breakfast',
                'name_es' => 'Bed and Breakfast',
                'name_en' => 'Bed and Breakfast',
                'description_es' => 'El menu actual incluye Bed and Breakfast dentro de Packages, pero apunta a un enlace sin pagina publica. Se conserva como paquete pendiente de contenido final confirmado.',
                'description_en' => 'The current menu includes Bed and Breakfast under Packages, but it points to a menu placeholder without a public page. It is preserved as a package pending confirmed final content.',
                'includes_es' => 'Placeholder: confirmar inclusiones oficiales antes de publicar detalles.',
                'includes_en' => 'Placeholder: confirm official inclusions before publishing details.',
                'price_note_es' => 'Precio no publicado en el sitio actual.',
                'price_note_en' => 'Price not published on the current site.',
                'cta_label_es' => 'Solicitar disponibilidad',
                'cta_label_en' => 'Request availability',
                'image' => '/assets/current-site/lifestyle-breakfast.webp',
                'sort_order' => 1,
            ],
            [
                'slug' => 'romantic-getaway',
                'name_es' => 'Romantic Getaway',
                'name_en' => 'Romantic Getaway',
                'description_es' => 'Paquete Romantic Getaway en Sayulita para dos adultos. El contenido publicado actual incluye estancia, desayuno continental, cena romantica premium para dos personas con botella de vino espumoso y bouquet de flores en la habitacion.',
                'description_en' => 'Romantic Getaway package in Sayulita for two adults. The current published content includes the stay, continental breakfast, one premium romantic dinner for two people with a bottle of sparkling wine and a bouquet of flowers in the room.',
                'includes_es' => 'Cena romantica en Henshin Sushi: Omakase Premium, seaweed salad, seleccion del chef, roll de 7 nigiris premium, Wagyu nigiri A5, miso soup y postre.',
                'includes_en' => 'Romantic dinner at Henshin Sushi: Omakase Premium, seaweed salad, chef selection, roll of 7 premium nigiris, Wagyu nigiri A5, miso soup and dessert.',
                'price_note_es' => 'El precio final no se publica aqui. La pagina actual indica restricciones y vigencia hasta Dec 20, 2024.',
                'price_note_en' => 'Final price is not published here. The current page indicates restrictions and validity until Dec 20, 2024.',
                'external_url' => 'https://nawallisayulita.com/romantic-getaway/',
                'cta_label_es' => 'Solicitar informacion',
                'cta_label_en' => 'Request information',
                'image' => '/assets/current-site/flower-cover.webp',
                'sort_order' => 2,
            ],
        ];

        foreach ($packages as $package) {
            Package::query()->updateOrCreate(['slug' => $package['slug']], [...$package, 'is_active' => true]);
        }
    }
}

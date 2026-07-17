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
                'description_es' => 'El menu actual incluye Bed and Breakfast dentro de Packages, pero apunta a un enlace sin pagina publica. Se conserva como paquete pendiente de contenido final.',
                'description_en' => 'The current menu includes Bed and Breakfast under Packages, but it points to a menu placeholder without a public page. It is preserved as a package pending final content.',
                'includes_es' => 'Placeholder: confirmar inclusiones oficiales antes de publicar detalles.',
                'includes_en' => 'Placeholder: confirm official inclusions before publishing details.',
                'price_note_es' => 'Precio no publicado en el sitio actual.',
                'price_note_en' => 'Price not published on the current site.',
                'cta_label_es' => 'Solicitar disponibilidad',
                'cta_label_en' => 'Request availability',
                'image' => 'https://nawallisayulita.com/wp-content/uploads/2023/09/home-lifestyle-1.webp',
                'sort_order' => 1,
            ],
            [
                'slug' => 'romantic-getaway',
                'name_es' => 'Romantic Getaway',
                'name_en' => 'Romantic Getaway',
                'description_es' => 'El WordPress actual expone una pagina publicada llamada Romantic Getaway. El detalle queda pendiente de normalizacion textual desde el snapshot completo.',
                'description_en' => 'The current WordPress exposes a published page named Romantic Getaway. Details remain pending text normalization from the full snapshot.',
                'includes_es' => 'Placeholder: contenido publicado detectado, pendiente de edicion.',
                'includes_en' => 'Placeholder: published content detected, pending editing.',
                'price_note_es' => 'Precio no publicado en el manifest.',
                'price_note_en' => 'Price not published in the manifest.',
                'external_url' => 'https://nawallisayulita.com/romantic-getaway/',
                'cta_label_es' => 'Solicitar informacion',
                'cta_label_en' => 'Request information',
                'image' => 'https://nawallisayulita.com/wp-content/uploads/2023/10/nawalli-cover-flower-8-copia.webp',
                'sort_order' => 2,
            ],
        ];

        foreach ($packages as $package) {
            Package::query()->updateOrCreate(['slug' => $package['slug']], [...$package, 'is_active' => true]);
        }
    }
}

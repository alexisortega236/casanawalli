<?php

namespace Database\Seeders\Demo;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'slug' => 'discover-the-charming-lifestyle-of-sayulita-nayarit',
                'title_es' => 'Discover the Charming Lifestyle of Sayulita, Nayarit',
                'title_en' => 'Discover the Charming Lifestyle of Sayulita, Nayarit',
                'excerpt_es' => 'Post publicado en el blog actual de Casa Nawalli.',
                'excerpt_en' => 'Post published on the current Casa Nawalli blog.',
                'body_es' => 'Contenido legacy detectado en WordPress. Pendiente de normalizacion completa desde el snapshot antes de publicarse como articulo final.',
                'body_en' => 'Legacy content detected in WordPress. Pending full normalization from the snapshot before publishing as a final article.',
                'published_at' => '2023-08-31 17:12:35',
                'sort_order' => 1,
            ],
            [
                'slug' => 'once-again-in-sayulita',
                'title_es' => 'ONCE AGAIN IN SAYULITA',
                'title_en' => 'ONCE AGAIN IN SAYULITA',
                'excerpt_es' => 'Post publicado en el blog actual de Casa Nawalli.',
                'excerpt_en' => 'Post published on the current Casa Nawalli blog.',
                'body_es' => 'Contenido legacy detectado en WordPress. Pendiente de normalizacion completa desde el snapshot antes de publicarse como articulo final.',
                'body_en' => 'Legacy content detected in WordPress. Pending full normalization from the snapshot before publishing as a final article.',
                'published_at' => '2023-08-30 00:21:50',
                'sort_order' => 2,
            ],
            [
                'slug' => 'what-to-do-in-sayulita',
                'title_es' => 'What to do in Sayulita?',
                'title_en' => 'What to do in Sayulita?',
                'excerpt_es' => 'Post publicado en el blog actual de Casa Nawalli.',
                'excerpt_en' => 'Post published on the current Casa Nawalli blog.',
                'body_es' => 'Contenido legacy detectado en WordPress. Pendiente de normalizacion completa desde el snapshot antes de publicarse como articulo final.',
                'body_en' => 'Legacy content detected in WordPress. Pending full normalization from the snapshot before publishing as a final article.',
                'published_at' => '2023-08-29 19:36:48',
                'sort_order' => 3,
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::query()->updateOrCreate(
                ['slug' => $post['slug']],
                [
                    ...$post,
                    'featured_image' => 'https://nawallisayulita.com/wp-content/uploads/2023/08/background-palmer-nawalli-2.webp',
                    'is_active' => true,
                    'seo_title_en' => $post['title_en'].' | Casa Nawalli',
                    'seo_title_es' => $post['title_es'].' | Casa Nawalli',
                    'seo_description_en' => $post['excerpt_en'],
                    'seo_description_es' => $post['excerpt_es'],
                ]
            );
        }
    }
}

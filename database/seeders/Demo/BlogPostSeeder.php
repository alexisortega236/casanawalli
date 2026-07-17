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
                'excerpt_es' => 'Sayulita combina playa, surf, cultura local y una energia bohemia que va mas alla de una escapada costera.',
                'excerpt_en' => 'Sayulita combines beach life, surf, local culture and bohemian charm beyond a simple coastal getaway.',
                'body_es' => 'Nestled on the beautiful Mexican Pacific coast, the picturesque town of Sayulita in Nayarit is much more than just a beach getaway. With its vibrant lifestyle and bohemian charm, Sayulita offers a unique experience that combines relaxation, adventure, and local culture. Here, immerse yourself in the relaxed pace of coastal life as you explore picturesque beaches, world class surfing, colorful streets, craft shops, art galleries, local restaurants and markets filled with handmade products.',
                'body_en' => 'Nestled on the beautiful Mexican Pacific coast, the picturesque town of Sayulita in Nayarit is much more than just a beach getaway. With its vibrant lifestyle and bohemian charm, Sayulita offers a unique experience that combines relaxation, adventure, and local culture. Here, immerse yourself in the relaxed pace of coastal life as you explore picturesque beaches, world class surfing, colorful streets, craft shops, art galleries, local restaurants and markets filled with handmade products.',
                'published_at' => '2023-08-31 17:12:35',
                'sort_order' => 1,
            ],
            [
                'slug' => 'once-again-in-sayulita',
                'title_es' => 'ONCE AGAIN IN SAYULITA',
                'title_en' => 'ONCE AGAIN IN SAYULITA',
                'excerpt_es' => 'Sayulita recupero su vitalidad como destino tropical con surf, cultura, gastronomia y comunidad multicultural.',
                'excerpt_en' => 'Sayulita regained its vitality as a tropical destination with surf, culture, gastronomy and a multicultural community.',
                'body_es' => 'After several years of steady growth, Sayulita has regained its vitality and demand as one of Mexico’s best tropical beach destinations. This small, laid-back town is secluded by exuberant tropical jungle and nested by a breathtaking bay. Located at the heart of Riviera Nayarit, it is just 40 miles north of Puerto Vallarta’s international airport. A long-standing destination for surfing circuits and enthusiasts, Sayulita offers lodging, restaurants, boutiques and galleries in a colorful coexistence with rural activities and Wirarika or Huichol culture.',
                'body_en' => 'After several years of steady growth, Sayulita has regained its vitality and demand as one of Mexico’s best tropical beach destinations. This small, laid-back town is secluded by exuberant tropical jungle and nested by a breathtaking bay. Located at the heart of Riviera Nayarit, it is just 40 miles north of Puerto Vallarta’s international airport. A long-standing destination for surfing circuits and enthusiasts, Sayulita offers lodging, restaurants, boutiques and galleries in a colorful coexistence with rural activities and Wirarika or Huichol culture.',
                'published_at' => '2023-08-30 00:21:50',
                'sort_order' => 2,
            ],
            [
                'slug' => 'what-to-do-in-sayulita',
                'title_es' => 'What to do in Sayulita?',
                'title_en' => 'What to do in Sayulita?',
                'excerpt_es' => 'Ideas publicadas para disfrutar Sayulita: playa, estrellas, Islas Marietas y paseos locales.',
                'excerpt_en' => 'Published ideas for enjoying Sayulita: beach life, star watching, Marietas Islands and local rides.',
                'body_es' => 'The current blog suggests starting with beach life, because Sayulita’s broad quiet beaches are one of its main pleasures. It also recommends watching the starry sky at night, planning a visit to the Marietas Islands with attention to closure days, and enjoying donkey or horse rides as part of the local experience. This legacy article is preserved as source content for later editorial refinement.',
                'body_en' => 'The current blog suggests starting with beach life, because Sayulita’s broad quiet beaches are one of its main pleasures. It also recommends watching the starry sky at night, planning a visit to the Marietas Islands with attention to closure days, and enjoying donkey or horse rides as part of the local experience. This legacy article is preserved as source content for later editorial refinement.',
                'published_at' => '2023-08-29 19:36:48',
                'sort_order' => 3,
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::query()->updateOrCreate(
                ['slug' => $post['slug']],
                [
                    ...$post,
                    'featured_image' => '/assets/current-site/palms-background.webp',
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

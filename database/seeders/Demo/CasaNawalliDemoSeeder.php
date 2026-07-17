<?php

namespace Database\Seeders\Demo;

use App\Models\Amenity;
use App\Models\Room;
use App\Models\RoomCategory;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class CasaNawalliDemoSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_name' => 'Casa Nawalli',
            'phone' => '(+52) 329 298 87 42',
            'whatsapp' => '523292988742',
            'email' => 'info@nawallisayulita.com',
            'address' => 'Miramar #13. Sayulita, Mexico',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::query()->updateOrCreate(['key' => $key], ['value' => $value, 'group' => 'general']);
        }

        $gardenSuite = RoomCategory::query()->updateOrCreate(
            ['slug' => 'garden-suite'],
            ['name_es' => 'Suite jardin', 'name_en' => 'Garden suite', 'sort_order' => 1]
        );

        $mainHouse = RoomCategory::query()->updateOrCreate(
            ['slug' => 'main-house'],
            ['name_es' => 'Casa principal', 'name_en' => 'Main house', 'sort_order' => 2]
        );

        $gardenRoom = RoomCategory::query()->updateOrCreate(
            ['slug' => 'garden-room'],
            ['name_es' => 'Habitacion jardin', 'name_en' => 'Garden room', 'sort_order' => 3]
        );

        $amenities = collect([
            ['name_es' => 'Desayuno hecho al momento', 'name_en' => 'Made to order breakfast', 'category' => 'hospitality'],
            ['name_es' => 'Agua filtrada', 'name_en' => 'Filtered water', 'category' => 'hospitality'],
            ['name_es' => 'Wi-Fi', 'name_en' => 'Wi-Fi', 'category' => 'comfort'],
            ['name_es' => 'Aire acondicionado', 'name_en' => 'Air conditioner', 'category' => 'comfort'],
            ['name_es' => 'Caja de seguridad', 'name_en' => 'Safety box', 'category' => 'security'],
            ['name_es' => 'Limpieza diaria', 'name_en' => 'Daily cleaning', 'category' => 'hospitality'],
            ['name_es' => 'Piscina de agua salada', 'name_en' => 'Salt water pool', 'category' => 'property'],
            ['name_es' => 'Acceso controlado 24 horas', 'name_en' => 'Access control 24 hours a day', 'category' => 'security'],
        ])->map(fn (array $amenity) => Amenity::query()->updateOrCreate(
            ['name_en' => $amenity['name_en']],
            [...$amenity, 'is_active' => true]
        ));

        $rooms = [
            [
                'category' => $gardenSuite,
                'slug' => 'oasis-owners-suite',
                'name_es' => 'Oasis Owner\'s Suite',
                'name_en' => 'Oasis Owner\'s Suite',
                'subtitle_es' => 'Originalmente el estudio del propietario',
                'subtitle_en' => 'Originally the owner\'s studio',
                'description_es' => 'Esta suite fue originalmente el estudio del propietario, con dos areas principales, cocineta equipada, comedor pequeno, cama queen, vista al jardin y acceso por un pasillo de servicio. Contenido demo basado en informacion publica actual.',
                'description_en' => 'This room was originally the owner\'s studio with two main areas, a fitted kitchenette, a small dining table, queen bed, garden view and access through a small service hallway. Demo content based on current public information.',
                'bed_type' => 'Queen size bed',
                'room_type' => 'Studio suite',
                'location_description' => 'Second floor, garden area',
                'featured_image' => 'https://images.unsplash.com/photo-1560185007-c5ca9d2c014d?auto=format&fit=crop&w=1200&q=80',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'category' => $gardenSuite,
                'slug' => 'infinite-coastlines',
                'name_es' => 'Infinite Coastlines',
                'name_en' => 'Infinite Coastlines',
                'subtitle_es' => 'Suite jardin',
                'subtitle_en' => 'Garden suite',
                'description_es' => 'Ubicada al fondo del jardin, esta suite se inspira en la observacion de las costas en movimiento, con terraza privada, cama king, mobiliario artesanal, refrigerador pequeno y estacion de cafe. Contenido demo.',
                'description_en' => 'Nested in the back of the garden, this suite is inspired by drifting coastlines, with a private terrace, king bed, handcrafted interiors, small fridge and coffee station. Demo content.',
                'bed_type' => 'King size bed',
                'room_type' => 'Garden suite',
                'location_description' => 'Back garden',
                'featured_image' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=1200&q=80',
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'category' => $gardenSuite,
                'slug' => 'tate-naaliwa',
                'name_es' => 'Tate Naaliwa',
                'name_en' => 'Tate Naaliwa',
                'subtitle_es' => 'Suite jardin',
                'subtitle_en' => 'Garden suite',
                'description_es' => 'Dedicada a Tate Naaliwa, diosa Wirarika de la lluvia y madre de todas las flores. La suite tiene terraza con vista al jardin, cama king y una atmosfera inspirada en lluvias tropicales. Contenido demo.',
                'description_en' => 'Dedicated to Tate Naaliwa, Wirarika goddess of rain and mother of all flowers. The suite has a garden-view terrace, king bed and an atmosphere inspired by tropical rains. Demo content.',
                'bed_type' => 'King size bed',
                'room_type' => 'Garden suite',
                'location_description' => 'Garden terrace',
                'featured_image' => 'https://images.unsplash.com/photo-1578683010236-d716f9a3f461?auto=format&fit=crop&w=1200&q=80',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'category' => $mainHouse,
                'slug' => 'celestial-vault',
                'name_es' => 'Celestial Vault',
                'name_en' => 'Celestial Vault',
                'subtitle_es' => 'Suite de la casa principal',
                'subtitle_en' => 'Main house suite',
                'description_es' => 'Habitacion amplia, acogedora y colorida inspirada en el vinculo natural con las estrellas y los cielos nocturnos abovedados. Incluye cama king o dos twin bajo solicitud previa. Contenido demo.',
                'description_en' => 'A generous, cozy and colorful room inspired by our natural bond with the stars and vaulted night skies. Includes a king bed or two twin beds if requested in advance. Demo content.',
                'bed_type' => 'King size bed',
                'room_type' => 'Main house suite',
                'location_description' => 'Main house',
                'featured_image' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=1200&q=80',
                'is_featured' => true,
                'sort_order' => 4,
            ],
            [
                'category' => $mainHouse,
                'slug' => 'dusk-and-dawn',
                'name_es' => 'Dusk & Dawn',
                'name_en' => 'Dusk & Dawn',
                'subtitle_es' => 'Habitacion casa principal',
                'subtitle_en' => 'Main house room',
                'description_es' => 'Habitacion brillante, petite, colorida y practica para parejas o viajeros solos. Contenido demo basado en informacion publica actual.',
                'description_en' => 'A bright, petite, colorful and practical room for couples or solo travelers. Demo content based on current public information.',
                'bed_type' => 'Queen size bed',
                'room_type' => 'Main house room',
                'location_description' => 'Main house',
                'featured_image' => 'https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?auto=format&fit=crop&w=1200&q=80',
                'is_featured' => false,
                'sort_order' => 5,
            ],
            [
                'category' => $gardenRoom,
                'slug' => 'stars-and-jasmines',
                'name_es' => 'Stars & Jasmines',
                'name_en' => 'Stars & Jasmines',
                'subtitle_es' => 'Habitacion jardin',
                'subtitle_en' => 'Garden room',
                'description_es' => 'Habitacion inspirada en la semejanza entre las flores de jazmin y las estrellas, con atmosfera fresca, cama queen y acabados artesanales. Contenido demo.',
                'description_en' => 'A room inspired by the resemblance between jasmine flowers and stars, with a fresh atmosphere, queen bed and handcrafted interiors. Demo content.',
                'bed_type' => 'Queen size bed',
                'room_type' => 'Garden room',
                'location_description' => 'Garden area',
                'featured_image' => 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?auto=format&fit=crop&w=1200&q=80',
                'is_featured' => false,
                'sort_order' => 6,
            ],
            [
                'category' => $gardenRoom,
                'slug' => 'whispering-ferns',
                'name_es' => 'Whispering Ferns',
                'name_en' => 'Whispering Ferns',
                'subtitle_es' => 'Habitacion jardin',
                'subtitle_en' => 'Garden room',
                'description_es' => 'Ubicada bajo la sombra del mango mas antiguo, esta habitacion abraza tonos verdes, interiores artesanales, terraza y vista al jardin. Contenido demo.',
                'description_en' => 'Located under the shade of the oldest mango tree, this room embraces fresh green tones, handcrafted interiors, a terrace and garden view. Demo content.',
                'bed_type' => 'Queen size bed',
                'room_type' => 'Garden room',
                'location_description' => 'Under the mango tree',
                'featured_image' => 'https://images.unsplash.com/photo-1602002418082-a4443e081dd1?auto=format&fit=crop&w=1200&q=80',
                'is_featured' => false,
                'sort_order' => 7,
            ],
        ];

        foreach ($rooms as $roomData) {
            $category = $roomData['category'];
            unset($roomData['category']);

            $room = Room::query()->updateOrCreate(
                ['slug' => $roomData['slug']],
                [
                    ...$roomData,
                    'room_category_id' => $category->id,
                    'capacity' => 2,
                    'is_active' => true,
                    'whatsapp_message' => 'Hello Casa Nawalli, I would like to request availability.',
                    'seo_title_en' => $roomData['name_en'].' | Casa Nawalli',
                    'seo_title_es' => $roomData['name_es'].' | Casa Nawalli',
                    'seo_description_en' => $roomData['description_en'],
                    'seo_description_es' => $roomData['description_es'],
                ]
            );

            $room->amenities()->sync($amenities->pluck('id')->all());
        }

        $this->call([
            ExperienceSeeder::class,
            PackageSeeder::class,
            PlazaBusinessSeeder::class,
            FaqSeeder::class,
            BlogPostSeeder::class,
            GalleryImageSeeder::class,
        ]);
    }
}

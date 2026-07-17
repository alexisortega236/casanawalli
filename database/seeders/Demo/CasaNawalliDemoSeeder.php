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
                'description_es' => 'Esta habitacion fue originalmente el estudio del propietario y cuenta con dos areas principales. La primera incluye una pequena sala, comedor, bano completo y cocineta equipada con refrigerador pequeno. La recamara tiene cama queen, textiles mexicanos bordados, tocador, doble closet, caja de seguridad y ventana con vista al jardin y area de piscina. Esta en segundo piso, al final del jardin, con acceso por un pequeno pasillo de servicio. Incluye desayuno continental cada manana y limpieza cada dos dias.',
                'description_en' => 'This room was originally the owner\'s studio with two main areas. Its first room includes a small sitting area, dining table, full bathroom and a fully equipped kitchenette with a small fridge. The bedroom includes a queen size bed with Mexican embroidered bedding and decor, a dressing table, double closet, safety box and a window with garden and pool area view. It is located on a second floor at the end of the garden, accessed through a small service hallway. Continental breakfast is included every morning and housekeeping is available every two days.',
                'bed_type' => 'Queen size bed',
                'room_type' => 'Studio suite',
                'location_description' => 'Second floor, garden area',
                'featured_image' => '/assets/current-site/room-oasis.webp',
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
                'description_es' => 'Ubicada al fondo del jardin, esta suite abraza tonos marinos y aire fresco. Su terraza privada mira hacia la casa principal, la piscina y el jardin. Infinite Coastlines se inspira en la observacion continua de las costas en movimiento. Sus interiores artesanales integran una puerta antigua de roble reutilizada como cabecera, cama king, comoda restaurada, closet, muebles de mimbre, mesa de cafe, refrigerador pequeno y estacion de cafe. Incluye balcon privado, Wi-Fi, caja de seguridad, limpieza diaria y bano completo con lavabo y regadera walk-in.',
                'description_en' => 'Nested in the back of the garden, this suite embraces marine colors and fresh air. Its private terrace overlooks the main house, swimming pool and garden. Infinite Coastlines was inspired by the continuous observation of drifting and moving coastlines. Its handcrafted interiors include an antique oak door repurposed as a headboard, king size bed, renovated chest of drawers, full closet, wicker furniture, coffee table, small fridge and coffee station. It includes a private balcony, Wi-Fi, safety box, daily housekeeping and a full bathroom with vanity sink and walk-in shower.',
                'bed_type' => 'King size bed',
                'room_type' => 'Garden suite',
                'location_description' => 'Back garden',
                'featured_image' => '/assets/current-site/room-infinite.webp',
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
                'description_es' => 'Tate Naaliwa, diosa Huichol de la lluvia que da vida tropical y madre de todas las flores, inspira esta suite de jardin dedicada a celebrar las gotas de lluvia. Tonos azul profundo y gris evocan las tormentas de verano sobre la costa. Afuera, una terraza con vista al jardin funciona como rincón de lectura o desayuno. El cuarto integra patrones pintados a mano, cama king, mesas de cafe y vanidad, bano privado con regadera walk-in, closet, caja de seguridad, Wi-Fi y limpieza diaria.',
                'description_en' => 'Tate Naaliwa, the Huichol goddess of rain who gives birth to tropical life and is the mother of all flowers, inspires this garden suite dedicated to raindrops. Deep blue and gray shades evoke summer storms along the coastline. A terrace with garden view sits outside the room as a reading or breakfast spot. The room includes hand painted drop-like patterns, king size bed, coffee and vanity tables, private full bathroom with walk-in shower, walk-in closet, safety box, Wi-Fi and daily housekeeping.',
                'bed_type' => 'King size bed',
                'room_type' => 'Garden suite',
                'location_description' => 'Garden terrace',
                'featured_image' => '/assets/current-site/room-naaliwa.webp',
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
                'description_es' => 'Habitacion amplia, acogedora y colorida inspirada en nuestro vinculo natural con las estrellas y los cielos nocturnos abovedados. Esta completamente renovada, con techos altos de vigas de madera, dos ventanas amplias, cama king super comoda o dos camas twin bajo solicitud previa, sala pequena con muebles de madera y mimbre, pisos pintados a mano, bano completo con regadera walk-in, Wi-Fi, limpieza diaria y caja de seguridad.',
                'description_en' => 'A generous, cozy and colorful room inspired by our natural bond with the stars and vaulted night skies. It is completely renovated with high wooden beam ceilings, two ample windows, a super comfy king size bed or two twin beds if requested in advance, a lovely sitting area with wooden and wicker furniture, hand-painted floors, full bathroom with walk-in shower, Wi-Fi, daily housekeeping and safety box.',
                'bed_type' => 'King size bed',
                'room_type' => 'Main house suite',
                'location_description' => 'Main house',
                'featured_image' => '/assets/current-site/room-celestial.webp',
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
                'description_es' => 'Dusk & Dawn es una habitacion brillante, petite, acogedora, colorida y practica. Incluye cama queen, muebles de madera tropical, wardrobe colorido, bano completo con regadera walk-in, accesorios ceramicos y textiles artesanales, aire acondicionado nuevo, ventilador de techo, caja de seguridad, Wi-Fi, cuatro almohadas muy comodas y limpieza diaria. Es ideal para parejas practicas o viajeros solos.',
                'description_en' => 'Dusk & Dawn is a bright, petite, cozy, colorful and practical room. It includes a queen size bed, tropical wood furniture, colorful wardrobe, full bathroom with walk-in shower, handcrafted ceramic accessories and textiles, new A/C, ceiling fan, safety box, Wi-Fi, four super comfy pillows and daily housekeeping. It is ideal for smart couples and solo travelers.',
                'bed_type' => 'Queen size bed',
                'room_type' => 'Main house room',
                'location_description' => 'Main house',
                'featured_image' => '/assets/current-site/room-dusk-dawn.jpeg',
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
                'description_es' => 'Stars & Jasmines se inspira en la semejanza entre las flores de jazmin y las estrellas. En una atmosfera diafana y fresca, esta habitacion renovada ofrece cama queen, mesa de cafe, bano completo y closet. Sus pisos pintados a mano, colores luminosos y mobiliario artesanal crean una sensacion tropical y relajada. Incluye Wi-Fi, caja de seguridad, variedad de almohadas y limpieza diaria.',
                'description_en' => 'Stars & Jasmines is inspired by the resemblance between jasmine flowers and stars. Within a diaphanous and fresh atmosphere, this fully refurbished room offers a queen size bed, coffee table, full bathroom and closet. Hand-painted floors, bright colors and handcrafted interiors create a fresh and tropically relaxed feeling. It includes Wi-Fi, safety box, variety of pillows and daily housekeeping.',
                'bed_type' => 'Queen size bed',
                'room_type' => 'Garden room',
                'location_description' => 'Garden area',
                'featured_image' => '/assets/current-site/lifestyle-garden.webp',
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
                'description_es' => 'Whispering Ferns esta ubicada bajo la sombra fresca del mango mas antiguo y alto. La habitacion abraza tonos verdes e interiores artesanales; incluye cama queen, mesa de cafe, wardrobe, terraza, bano completo privado, caja de seguridad, Wi-Fi y limpieza diaria. Tiene una hermosa vista al jardin, al que se integra de forma natural.',
                'description_en' => 'Whispering Ferns is located under the fresh shade of the oldest and towering mango tree. The room embraces green tones and handcrafted interiors; it includes a queen size bed, coffee table, wardrobe, terrace, private full bathroom, safety box, Wi-Fi and daily housekeeping. It has a gorgeous garden view to which it is naturally integrated.',
                'bed_type' => 'Queen size bed',
                'room_type' => 'Garden room',
                'location_description' => 'Under the mango tree',
                'featured_image' => '/assets/current-site/amenity-edible-garden.webp',
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

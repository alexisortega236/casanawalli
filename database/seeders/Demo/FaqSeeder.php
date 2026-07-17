<?php

namespace Database\Seeders\Demo;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            ['how-to-get-there', 'Travel', '¿Como llegar a Casa Nawalli?', 'How do I get to Casa Nawalli?', 'Casa Nawalli se ubica en Miramar #13, Sayulita, Nayarit. El sitio actual conserva informacion de llegada en FAQ y contacto.', 'Casa Nawalli is located at Miramar #13, Sayulita, Nayarit. The current site keeps arrival information in FAQ and contact.'],
            ['rent-a-car', 'Travel', '¿Necesito rentar auto?', 'Should I rent a car?', 'El FAQ actual trata esta pregunta. La respuesta final debe confirmarse con operacion antes de publicar recomendaciones especificas.', 'The current FAQ addresses this question. The final answer should be confirmed with operations before publishing specific recommendations.'],
            ['weather', 'Travel', '¿Como es el clima?', 'What is the weather like?', 'El FAQ actual incluye clima de Sayulita. Mantener respuesta editorial sin inventar pronosticos.', 'The current FAQ includes Sayulita weather. Keep editorial guidance without inventing forecasts.'],
            ['distance-to-beach', 'Location', '¿Que tan cerca esta la playa?', 'How close is the beach?', 'Casa Nawalli comunica que esta a una cuadra o cuadra y media del mar, en la zona norte de Sayulita.', 'Casa Nawalli communicates that it is one block to a block and a half from the sea, on Sayulita’s north side.'],
            ['adults-only', 'Hotel', '¿Casa Nawalli es solo para adultos?', 'Is Casa Nawalli adults-only?', 'Si. El sitio actual comunica Casa Nawalli como hotel boutique adults-only.', 'Yes. The current site communicates Casa Nawalli as an adults-only boutique hotel.'],
            ['pets', 'Hotel', '¿Aceptan mascotas?', 'Are pets allowed?', 'El FAQ actual incluye mascotas. La politica final debe confirmarse antes de publicarla como regla definitiva.', 'The current FAQ includes pets. The final policy should be confirmed before publishing it as a definitive rule.'],
            ['safety', 'Hotel', '¿Es seguro?', 'Is it safe?', 'El sitio actual enfatiza comodidad, seguridad y conveniencia, ademas de sistema de seguridad y acceso controlado.', 'The current site emphasizes comfort, security and convenience, plus security system and controlled access.'],
            ['things-to-do', 'Sayulita', '¿Que hacer en Sayulita?', 'What can I do in Sayulita?', 'El sitio actual tiene contenido de blog sobre que hacer en Sayulita y estilo de vida local.', 'The current site has blog content about what to do in Sayulita and the local lifestyle.'],
            ['touristic-seasons', 'Travel', '¿Cuales son las temporadas turisticas?', 'What are the touristic seasons?', 'Las habitaciones publicadas mencionan temporada baja del 1 de junio al 31 de octubre, alta del 1 de noviembre al 31 de mayo y holiday del 20 de diciembre al 4 de enero.', 'Published room pages mention low season from June 1 to October 31, high season from November 1 to May 31 and holiday from December 20 to January 4.'],
        ];

        foreach ($faqs as $index => [$slug, $category, $questionEs, $questionEn, $answerEs, $answerEn]) {
            Faq::query()->updateOrCreate(
                ['slug' => $slug],
                [
                    'category' => $category,
                    'question_es' => $questionEs,
                    'question_en' => $questionEn,
                    'answer_es' => $answerEs,
                    'answer_en' => $answerEn,
                    'is_active' => true,
                    'sort_order' => $index + 1,
                ]
            );
        }
    }
}

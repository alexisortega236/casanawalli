<?php

namespace Tests\Feature;

use Database\Seeders\Demo\CasaNawalliDemoSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicHomeTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }

    public function test_home_renders_featured_rooms(): void
    {
        $this->seed(CasaNawalliDemoSeeder::class);

        $response = $this->get('/en');

        $response->assertOk();
        $response->assertSee('A hidden garden, one block from the sea.');
        $response->assertSee('Infinite Coastlines');
    }

    public function test_availability_request_can_be_submitted(): void
    {
        $this->seed(CasaNawalliDemoSeeder::class);

        $response = $this->post('/en/availability', [
            'name' => 'Demo Guest',
            'email' => 'guest@example.com',
            'phone' => '+52 329 000 0000',
            'arrival_date' => now()->addDays(10)->toDateString(),
            'departure_date' => now()->addDays(13)->toDateString(),
            'guests' => 2,
            'message' => 'Demo inquiry only.',
        ]);

        $response->assertRedirect('/en/availability');
        $this->assertDatabaseHas('availability_requests', [
            'email' => 'guest@example.com',
            'locale' => 'en',
            'status' => 'new',
        ]);
    }

    public function test_content_pages_render_seeded_content(): void
    {
        $this->seed(CasaNawalliDemoSeeder::class);

        $this->get('/en/experiences')->assertOk()->assertSee('Edible tropical gardens');
        $this->get('/en/plaza-nawalli')->assertOk()->assertSee('Marea Cafe');
        $this->get('/en/faq')->assertOk()->assertSee('Is Casa Nawalli adults-only?');
        $this->get('/en/blog')->assertOk()->assertSee('What to do in Sayulita?');
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomePageTests extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Hellen Dutch Art');
    }

    /** @test */
    public function the_static_pages_are_loaded_when_guest_clicks_menu_link()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/theartist');
        $response->assertStatus(200);
        $response->assertSee('Hellen Dutch');

        $response = $this->get('/whyborneo');
        $response->assertStatus(200);
        $response->assertSee('Why Borneo ?');

        $response = $this->get('/materials');
        $response->assertStatus(200);
        $response->assertSee('Use of Materials');

        $response = $this->get('/contactme');
        $response->assertStatus(200);
        $response->assertSee('New Message');
    }
}

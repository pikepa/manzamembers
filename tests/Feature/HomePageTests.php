<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomePageTests extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function anyone_can_read_the_home_page()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/');
        $response
            ->assertStatus(200)
            ->assertSee('Malaysian');
    }

    /** @test */
    public function the_static_pages_are_loaded_anyone_clicks_menu_link()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/aboutus');
        $response->assertStatus(200);
        $response->assertSee('About MANZA');

    }
}

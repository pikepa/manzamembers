<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ManageEventsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_read_all_the_events()
    {
        //Given we have event in the database
        $event = factory('App\Event')->create();

        //When user visit the events page
        $response = $this->get('/');
        
        //He should be able to read the event
        $response->assertSee($event->title);
    }
}

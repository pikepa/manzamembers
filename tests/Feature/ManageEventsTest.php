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
        $event = factory('App\Event')->create([
                'title' => 'Title One',
        ]);

        //When user visit the events page
        $response = $this->get('/');

        //He should be able to read the event
        $response
            ->assertSee('Title One');
    }

    /** @test */
    public function an_authorised_user_can_edit_all_the_events()
    {
        $event = factory('App\Event')->create();

        $this->signIn();
        $response = $this->get('/event/'.$event->id.'/edit');

        $response
            ->assertStatus(200)
            ->assertSee('Edit Event Details');
    }






}

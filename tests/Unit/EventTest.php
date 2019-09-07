<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_signed_in_user_can_edit_date_published()
    {
        $event = factory('App\Event')->create([
            'published_at' => Carbon::createFromFormat('d/m/Y', '11/06/1990'),
        ]);
                     
        $this->signIn();
        $response = $this->get('/event/'.$event->id.'/edit');

        $response
            ->assertStatus(200)
            ->assertSee('Published on')
            ->assertSee($event->published_at->format('Y-m-d'));
    }

        /** @test */
        public function a_signed_in_user_can_edit_event_status()
        {
            $event = factory('App\Event')->create([
                'status' => 'Pending',
            ]);
                         
            $this->signIn();
            $response = $this->get('/event/'.$event->id.'/edit');
    
            $response
                ->assertStatus(200)
                ->assertSee('Status')
                ->assertSee('Pending');
        }
}

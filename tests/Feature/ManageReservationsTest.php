<?php

namespace Tests\Feature;

use App\Event;
use Carbon\Carbon;
use Tests\TestCase;
use App\Reservation;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageReservationsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_reservation_can_be_saved_to_published_event()
    {
        $reservation = factory(Reservation::class)->make();
        $reservation->save();
        $this->assertDatabaseHas('reservations', ['name' => $reservation['name']]);
        $this->assertDatabaseHas('reservations', ['email' => $reservation['email']]);
        $this->assertDatabaseHas('reservations', ['res_qty' => $reservation['res_qty']]);
    }

    /** @test */
    public function a_guest_can_not_see_a_guest_listing_for_a_published_event()
    {
        $reservation = factory(Reservation::class)->create();
        $response = $this->get('/reservation/{{ $reservation->event_id }}');
        $response->assertRedirect('/login');
    }
    /** @test */
    public function an_authorised_user_can_see_a_guest_listing_for_a_published_event()
    {
        $this->withoutExceptionHandling();

        $reservation = factory(Reservation::class)->create([
            'name' => 'Peter Pike',
            'mobile' => '01121316106',
            'email'=> 'name@safemail.com',
            'res_qty'=> 3,
        ]);
                     
        $this->signIn();

        $response = $this->get('/reservation/'.$reservation->event_id);
        $response->assertStatus(200)
            ->assertSee('Peter Pike')
            ->assertSee('01121316106')
            ->assertSee('name@safemail.com')
            ->assertSee('3');

    }
    /** @test */
    public function an_guest_can_create_a_reservation()
    {
      //  $this->withExceptionHandling();
        $event = factory(Event::class)->create();

        $response = $this->get('/reservation/create/'.$event->id);
        $response->assertStatus(200)
            ->assertSee('Make a Reservation')
            ->assertSee('Human Verification Total');


    }    /** @test */
    public function an_guest_can_submit_a_booking_for_a_published_event()
    {
        $this->withExceptionHandling();
        $reservation = factory(Reservation::class)->make(['name'=>'Peter Pike']);
        $reservation->save();
        $this->assertDatabaseHas('reservations', ['name' => 'Peter Pike']);
 
    }


}

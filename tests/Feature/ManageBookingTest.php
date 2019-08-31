<?php

namespace Tests\Feature;

use App\Booking;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageBookingTest extends TestCase
{
    use WithFaker, RefreshDatabase;

 
    /** @test */
    public function a_booking_can_be_added_to_the_database()
    {
        $booking = factory(Booking::class)->make();
        $booking->save();
        $this->assertDatabaseHas('bookings', ['name' => $booking['name']]);
    }

    /** @test */
    public function a_guest_can_not_view_the_bookings_index()
    {
        $category = factory(Booking::class)->create();
        $response = $this->get('/byevent/{{ event_id }}');
        $response->assertRedirect('/login');
    }

    /** @test */
    public function a_SignedIn_user_can_view_the_bookings_index()
    {
        $this->signIn();
        $category = factory(Booking::class)->create();
        $response = $this->get('/byevent/1');
        $response->assertStatus(200);
    }
}

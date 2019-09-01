<?php

namespace Tests\Feature;

use App\Booking;
use Tests\TestCase;
use App\BookingItem;
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

    /** @test */
    public function a_signed_in_user_can_delete_a_booking()
    {
        $this->signIn();
        $booking = factory(Booking::class)->create();
        $booking_items = factory(BookingItem::class,5)->create([
                        'booking_id'=>$booking->id, 
        ]);
        $this->delete('/booking/'.$booking->id)->assertRedirect('/byevent/'.$booking->event_id);
        $this->assertDatabaseMissing('booking_items',['booking_id' => $booking->id]);
        $this->assertDatabaseMissing('bookings',['id'=> $booking->id]);

    }
}

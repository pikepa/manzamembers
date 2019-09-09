<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageDashboardItems extends TestCase
{
    use WithFaker, RefreshDatabase;
  
    /** @test */
    public function only_events_which_are_active_can_display_on_the_home_page()
    {
        //Given we have event in the database
        $event = factory('App\Event')->create([
                'title' => 'Title One',
                'status' => 'Published',
                'published_at' => null]);

        $response = $this->get('/');
        $response->assertSee('https://manzamembers.test/event/1');
        $response->assertSee('Title One');
        $response->assertStatus(200);

    }
    /** @test */
    public function a_signed_in_user_can_see_the_title_of_events_with_bookings()
    {
        //Given we have event in the database
        $event = factory('App\Event')->create([
                'title' => 'Title One',
                'published_at' => null]);

        $booking = factory('App\Booking')->create([
                'event_id' => $event->id,
                'confirmed_at' => Carbon::now()],10);

        $this->signIn();

        $response = $this->get('/');
        $response->assertSee('https://manzamembers.test/byevent/1');
        $response->assertStatus(200);
    }


    /** @test */
    public function a_signed_in_user_can_see_the_title_of_events_with_reservations()
    {
        //Given we have event in the database
        $event = factory('App\Event')->create([
                'title' => 'Title One',
                'published_at' => null]);

        $booking = factory('App\Reservation')->create([
                'event_id' => $event->id,
                'name' => 'Sandy pike']);

        $this->signIn();

        $response = $this->get('/');
        $response->assertSee('https://manzamembers.test/reservation/1');
        $response->assertStatus(200);
    }

    
    /** @test */
    public function published_bookings_only_events_on_the_home_page_show_bookings_coming_soon()
    {
        //Given we have event in the database
        $event = factory('App\Event')->create([
                'title' => 'Title One',
                'status' => 'Published',
                'bookings_only' => 'Bookings Only',
                'published_at' => null]);

        $response = $this->get('/');
        $response->assertSee($event->path());
        $response->assertSee('Bookings Opening Soon');
        $response->assertStatus(200);

    } 


    /** @test */
    public function open_booking_only_events_on_the_home_page_show_register_now()
    {
        //Given we have event in the database
        $event = factory('App\Event')->create([
                'title' => 'Title One',
                'status' => 'Open',
                'bookings_only' => 'Bookings Only',
                'published_at' => null]);
             
        $response = $this->get('/');
        $response->assertSee($event->path());
        $response->assertSee('Register Now');
        $response->assertStatus(200);

    } 


    /** @test */
    public function Sold_out_booking_only_events_on_the_home_page_show_registrations_closed()
    {
        //Given we have event in the database
        $event = factory('App\Event')->create([
                'title' => 'Title One',
                'status' => 'Sold Out',
                'bookings_only' => 'Bookings Only',
                'published_at' => null]);
             
        $response = $this->get('/');
        $response->assertSee($event->path());
        $response->assertSee('Sorry Registrations Closed!');
        $response->assertStatus(200);

    } 

    /** @test */
    public function Published_booking_and_tickets_only_events_on_the_home_page_show_bookings_opening_soon()
    {
        //Given we have event in the database
        $event = factory('App\Event')->create([
                'title' => 'Title One',
                'status' => 'Published',
                'bookings_only' => 'Booking & Tickets',
                'published_at' => null]);
             
        $response = $this->get('/');
        $response->assertSee($event->path());
        $response->assertSee('Bookings Opening Soon');
        $response->assertStatus(200);

    } 

    /** @test */
    public function Open_booking_and_tickets_only_events_on_the_home_page_show_get_your_tickets_now()
    {
        //Given we have event in the database
        $event = factory('App\Event')->create([
                'title' => 'Title One',
                'status' => 'Open',
                'bookings_only' => 'Booking & Tickets',
                'published_at' => null]);
             
        $response = $this->get('/');
        $response->assertSee($event->path());
        $response->assertSee('Get Your Tickets Now');
        $response->assertStatus(200);

    } 


    /** @test */
    public function Sold_out_booking_and_tickets_only_events_on_the_home_page_show_sold_out()
    {
        //Given we have event in the database
        $event = factory('App\Event')->create([
                'title' => 'Title One',
                'status' => 'Sold Out',
                'bookings_only' => 'Booking & Tickets',
                'published_at' => null]);
             
        $response = $this->get('/');
        $response->assertSee($event->path());
        $response->assertSee('Sold Out - Sorry!');
        $response->assertStatus(200);

    } 

}

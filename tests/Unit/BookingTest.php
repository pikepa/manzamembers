<?php

namespace Tests\Unit;

use App\User;
use App\Event;
use App\Booking;
use Tests\TestCase;
use App\BookingItem;
use App\Cartreceipt;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookingTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    /** @test */
    public function bookings_database_has_expected_columns()
    {
        $this->assertTrue( 
          Schema::hasColumns('bookings', [
            'id','event_id', 'email', 'name', 'memb_no','add_info',
            'table_no','confirmed_at','receipt_url',]), 1);
    }

    /** @test */
    public function a_booking_has_many_booking_items()
    {
        $event           = factory(Event::class)->create(); 
        $booking        = factory(Booking::class)->create(['event_id' => $event->id]);
        $booking_item   = factory(BookingItem::class)->create(['booking_id' => $booking->id]);
   
        // Method 1: A comment exists in a post's comment collections.
        $this->assertTrue($booking->booking_items->contains($booking_item));
        
        // Method 2: Count that a post comments collection exists.
        $this->assertEquals(1, $booking->booking_items->count());
        // Method 3: Comments are related to posts and is a collection instance.
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $booking->booking_items);
    }
    
    /** @test */
    public function a_booking_has_many_cart_receipts()
    {
        $user           = factory(User::class)->create();
        $event          = factory(Event::class)->create(); 
        $booking        = factory(Booking::class)->create(['event_id' => $event->id]);
        $cartreceipts   = factory(Cartreceipt::class)->create(['booking_id' => $booking->id, 'owner_id' => $user->id]);
   
        // Method 1: A comment exists in a post's comment collections.
        $this->assertTrue($booking->cartreceipts->contains($cartreceipts));
        // Method 2: Count that a post comments collection exists.
        $this->assertEquals(1, $booking->cartreceipts->count());
        // Method 3: Comments are related to posts and is a collection instance.
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $booking->cartreceipts);
    }
}


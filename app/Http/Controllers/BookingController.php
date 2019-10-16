<?php

namespace App\Http\Controllers;

use App\Event;
use App\Booking;
use App\BookingItem;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Restricting certain functions to Auth Users only.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => [ 'show','store',]]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings=Booking::get();
    
        return view ('bookings.index', compact('bookings'));
    }    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byevent($id)
    {
        $bookings=Booking::with('event','booking_items')
            ->where('event_id',$id)->orderBy('created_at','asc')->get();
        $event=Event::find($id);
        return view ('bookings.index', compact('bookings','event'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    { 
        $booking = new Booking;
        $event = Event::find($id);

        return view('bookings.create', compact('booking','event'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($booking_id)
    {
        $booking = Booking::with('cartreceipts')->find($booking_id);
                                       
            $eventbooking = Event::with('bookings')->find($booking->event_id);

            $orders=BookingItem::with('priceitems')->with('category')->where('booking_id',$booking_id)->get();
            
            $cartreceipts  = $booking->cartreceipts;
            return view('bookings.show', compact('orders','eventbooking','booking','cartreceipts'));

    }


    public function orders($event_id)
    {
   //     $booking = Booking::with('cartreceipts')->find($booking_id);
                                       
            $bookings = Booking::where('event_id',$event_id)->pluck('id')->toArray();
            $eventbooking = Event::find($event_id);


            $orders=BookingItem::orderBy('price_item_id')->with('priceitems')->with('category')
                    ->whereIn('booking_id',$bookings)->get()
                    ->groupBy(function($item) {
                        return $item->price_type_id;
                    });
       //    dd($orders);
                                 
            $grouped = $orders->groupBy('price_item_id');

       //     dd($grouped);
             

     //       $cartreceipts  = collect([]);
            return view('bookings.orders', compact('grouped','orders','eventbooking'));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        return view('bookings.edit_table', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
            $validatedrequest = $this->validate(request(), [
            'table_no' => 'nullable|Min:0|notin:0',
        ]);
        $booking->table_no = $request->table_no;
        $booking->save();

        return redirect('byevent/'.$booking->event_id)->with('Success', 'Table has been updated');

    }
                             

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
   public function destroy(Booking $booking)
    {
        $booking->booking_items()->delete();
        $booking->delete();
        return redirect('byevent/'.$booking->event_id)->with('Success', 'Booking and Items have been deleted');
    }
}

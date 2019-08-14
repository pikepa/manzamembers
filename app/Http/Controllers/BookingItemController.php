<?php

namespace App\Http\Controllers;

use Session;
use App\Event;
use App\Priceitem;
use App\BookingItem;
use Illuminate\Http\Request;

class BookingItemController extends Controller
{

    /**
     * Restricting certain functions to Auth Users only.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

                    dd('Stop Here');
                     
            $event_id =session::get('event_id');
            $booking_id =session::get('booking_id');

       //     $bookings=BookingItem::where('booking_id',$booking_id)->get();

            $eventbooking = Event::with('bookings')->find($event_id);
            $tickettypes =Priceitem::with('category')->members()->get();
            $non_tickettypes =Priceitem::with('category')->nonmembers()->get();
            $orders=BookingItem::with('category')->where('booking_id',session::get('booking_id'))->get();
            $booking_item=new BookingItem;

             
            return view('booking_items.show', compact('booking_item','orders','eventbooking','tickettypes','non_tickettypes'));    

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validatedrequest = $this->validate(request(), [
            'qty' => 'required|Min:0|notin:0',
            'type' => 'required',
         //   'memb_no' => 'required',
        ]);               
       $priceitem=Priceitem::with('category')->findOrFail($request->type) ;                 
       $booking_item = new BookingItem;

       $booking_item->booking_id = session::get('booking_id');
       $booking_item->price_item_id = $priceitem->id;
       $booking_item->price_type_id = $priceitem->price_type_id;
       $booking_item->price = $priceitem->price;
       $booking_item->qty = $request->qty;

       $booking_item->save();

       return redirect($booking_item->path())->with('success', 'Order has been added');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $event_id =session::get('event_id',0);
            $booking_id =session::get('booking_id',0);

       //     $bookings=BookingItem::where('booking_id',$booking_id)->get();

            $eventbooking = Event::with('bookings')->find($event_id);
            $tickettypes =Priceitem::with('category')->members()->get();
            $non_tickettypes =Priceitem::with('category')->nonmembers()->get();

            $orders=BookingItem::with('priceitems')->with('category')->where('booking_id',session::get('booking_id'))->get();
            $booking_item=new BookingItem;
             
            return view('booking_items.show', compact('booking_item','orders','eventbooking','tickettypes','non_tickettypes'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookingitem = BookingItem::find($id);
        $bookingitem->delete();

        return redirect('/bookingitems/'.session::get('booking_id',0))->with('Success', 'Booking Line has been deleted');

    }
}

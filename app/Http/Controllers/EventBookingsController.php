<?php

namespace App\Http\Controllers;

use Session;
use App\Event;
use App\Booking;
use App\Category;
use App\Priceitem;
use App\Membership;
use Illuminate\Http\Request;
use App\Billing\PaymentGateway;
use App\Billing\PaymentFailedException;
use App\Exceptions\NotEnoughTicketsException;

class EventBookingsController extends Controller
{
      /**
     * Restricting certain functions to Auth Users only.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show','create','store']]);
    }

    public function create($id)
    {

        $bookings = Booking::where('event_id',$id)->get();
        $eventbooking = Event::with('bookings')->findOrFail($id);

      //  dd($eventbooking);

        return view('bookings.create', compact('eventbooking','eventtickettypes'));
    }


    public function store(Request $request)
    {
      $validmember = 'False';
        $validatedrequest = $this->validate(request(), [
            'event_id' => 'required|numeric|min:0|not_in:0',
            'name' => 'required',
            'email' => 'required',
            'add_info' => 'required',
          //  |in(["MANZA","MNZCC","MABC"])
         //   'memb_no' => 'required',
        ]);
        $memb=$request->memb_no;

       $booking = new Booking;

        if(Membership::where('member_no',$request->memb_no)
                      ->where('status', 'current')->get()->count() > 0 ){
            $booking->memb_no = $request->memb_no;
        }else{
            $booking->memb_no = 'N-'.$request->memb_no;
        };

       $booking->event_id = $request->event_id;
       $booking->name = $request->name;
       $booking->email = $request->email;
       $booking->add_info = $request->add_info;

       $booking->save();

        session()->put('booking',$booking);             
        session(['booking_id' => $booking->id]);
        session(['event_id' => $booking->event_id]);

       return redirect('/bookingitems/'.$booking->id);

  }
}

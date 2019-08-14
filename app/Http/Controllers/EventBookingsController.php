<?php

namespace App\Http\Controllers;

use Session;
use App\Event;
use App\Booking;
use App\Category;
use App\Priceitem;
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
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    private $paymentGateway;
 /*   
    public function __construct(PaymentGateway $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }
*/

    public function create($id)
    { 

        $bookings = Booking::where('event_id',$id)->get();
        $eventbooking = Event::with('bookings')->findOrFail($id);
                     
        return view('bookings.create', compact('bookings','eventbooking','eventtickettypes'));    
    }


    public function store(Request $request)
    {
        $validatedrequest = $this->validate(request(), [
            'event_id' => 'required|numeric|min:0|not_in:0',
            'name' => 'required',
            'email' => 'required',
         //   'memb_no' => 'required',
        ]);               
                           
       $booking = new Booking;

       $booking->event_id = $request->event_id;
       $booking->name = $request->name;
       $booking->email = $request->email;
       $booking->memb_no = $request->memb_no;
       $booking->add_info = $request->add_info;


       $booking->save();

        session(['booking_id' => $booking->id]);
        session(['event_id' => $booking->event_id]);

       return redirect('/bookingitems/'.$booking->id);

  }
}

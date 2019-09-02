<?php

namespace App\Http\Controllers;

use App\Event;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Restricting certain functions to Auth Users only.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => [ 'create','show','store',]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {   $event = Event::findOrFail($id);
         $reservations= $event->reservations  ;          
        return view('reservations.index',compact('event','reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $event=Event::findOrFail($id);
       
        $reservation= new Reservation;                                                                                                                                     
        return view('reservations.create',compact('reservation','event'));
                     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate(request(), [
                    'event_id' => 'required|numeric|min:0|not_in:0',
                    'name' => 'required|min:5',
                    'email' => 'required|email',
                    'res_qty' => 'required|numeric|min:0|not_in:0',
                    'verification' => 'required|numeric|min:0|not_in:0',
                ]);   

        $reservation = new Reservation; 

        $reservation->event_id = $request->event_id; 
        $reservation->name = $request->name; 
        $reservation->mobile = $request->mobile; 
        $reservation->email = $request->email; 
        $reservation->res_qty = $request->res_qty; 
             
        $reservation->save();

   //     return redirect('/event/'.$request->event_id)
   //     ->with('message', 'Your reservation has been added'); 

        return view('reservations.success', compact('booking'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect('/reservation/'.$reservation->event_id)->with('Success', 'Booking Line has been deleted');
    }


    public function success()
    {
      $booking=Booking::with('event')->findOrFail(session::get('booking_id'));
      $totalcost=BookingItem::cost()/100;
      $totaltickets=BookingItem::tickets();
      $ccmembers=['manzaoffice@gmail.com','manzawebsite@gmail.com'];

      session()->forget(['booking_id', 'event_id']);
             
      Mail::to($booking->email)
            ->bcc($ccmembers)->send(new BookingConfirmed($booking ));

      $text=$text=str_ireplace('<p>','',$booking->event->v_address);
      $text=$text=str_ireplace('</p>','',$text);

      $event=[
        'title'=>$booking->event->title,
        'add_title'=>$booking->event->add_info,
        'venue'=>$booking->event->venue.', '.$text,
        'timing'=>$booking->event->timing,
        'date'=>$booking->event->date->format('M d, Y'),
      ];

      $bccmembers=['manzatourskl@gmail.com','manzaoffice@gmail.com','manzawebsite@gmail.com'];

      Mail::to($booking->email)
            ->bcc($bccmembers)
            ->send(new BookingTicketsSent($booking,$event,$totaltickets));



       return view('stripe.success', compact('booking'));

    }

}

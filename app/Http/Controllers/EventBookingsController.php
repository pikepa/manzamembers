<?php

namespace App\Http\Controllers;

use App\Event;
use App\Booking;
use Illuminate\Http\Request;
use App\Billing\PaymentGateway;
use App\Billing\PaymentFailedException;
use App\Exceptions\NotEnoughTicketsException;

class EventBookingsController extends Controller
{
    private $paymentGateway;
 /*   
    public function __construct(PaymentGateway $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }
*/

    public function create($id)
    { 
        $booking = new Booking;
        $event = Event::find($id);
        return view('bookings.create', compact('booking','event'));    
    }


    public function store(Request $request, $eventId)
    {
     //   dd('Arrived in Store Method awaiting further work');

        $event = Event::published()->findOrFail($eventId);

        $this->validate(request(), [
            'email' => 'required',
            'ticket_quantity' => ['required', 'integer', 'min:1'],
            'payment_token' => 'required',
        ]);

        try {
            $booking = $event->bookTickets(request('email'), request('ticket_quantity'));
            $this->paymentGateway->charge(request('ticket_quantity') * $event->ticket_price, request('payment_token'));
            return response()->json([], 201);
        } catch (PaymentFailedException $e) {
            $booking->cancel();
            return response()->json([], 422);
        } catch (NotEnoughTicketsException $e) {
            return response()->json([], 422);
        }
    }

}

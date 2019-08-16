<?php

namespace App\Http\Controllers;
use Session;
use App\Booking;
use Stripe;
use App\BookingItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function precheckout()
    {
      $booking=Booking::findOrFail(session::get('booking_id'));
      $totalcost=BookingItem::cost()/100;
      $totaltickets=BookingItem::tickets();
               
      return view('stripe.newcheckout', compact('totalcost'));    
             

    }
    public function charge(Request $request)
    {
      $booking=Booking::findOrFail(session::get('booking_id'));
      $totalcost=BookingItem::cost();
      $totaltickets=BookingItem::tickets();

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $charged= Stripe\Charge::create ([
                "amount" => $totalcost,
                "currency" => "myr",
                "source" => $request->stripeToken,
                "description" => 'Booking for '.$totaltickets .' @ RM '.$totalcost/100
        ]);
  
        Session::flash('success', 'Payment successful!');
         dd($charged); 
        return back();

    }

}

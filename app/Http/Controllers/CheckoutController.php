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

        try {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $charged= Stripe\Charge::create ([
                    "amount" => $totalcost,
                    "currency" => "myr",
                    "source" => $request->stripeToken,
                    "description" => 'Booking for '.$totaltickets .' @ RM '.(($totalcost/100)/$totaltickets).' each.'
            ]);

            Session::flash('success', 'Payment successful!');
            $booking->confirmed_at = now()->setTimezone('Asia/Kuala_Lumpur');
            $booking->receipt_url = $charged->receipt_url;
            $booking->update();


        } catch (\Stripe\Error\ApiConnection $e) {
            dd($e); // Network problem, perhaps try again.dd
        } catch (\Stripe\Error\InvalidRequest $e) {
            dd($e); // You screwed up in your programming. Shouldn't happen!
        } catch (\Stripe\Error\Api $e) {
            dd($e); // Stripe's servers are down!
        } catch (\Stripe\Error\Card $e) {
    //        echo 'Im here';
    //        dd($e); // Card was declined.
            return redirect( '/checkout/' );
        }

        return redirect('/success');
    }
    public function success()
    {
      $booking=Booking::findOrFail(session::get('booking_id'));
      $totalcost=BookingItem::cost()/100;
      $totaltickets=BookingItem::tickets();

       return view('stripe.success', compact('booking'));


    }
}

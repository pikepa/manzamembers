<?php

namespace App\Http\Controllers;
use Session;
use App\Booking;
use App\BookingItem;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function precheckout()
    {
        $booking=Booking::findOrFail(session::get('booking_id'));
        $totalcost=BookingItem::cost();
        $totaltickets=BookingItem::tickets();

        $stripe= new Stripe(getenv('STRIPE_SECRET_KEY'));

        $customer=$stripe->customers()->create([
                'email' => $booking->email,
            ]);
        dd($customer);
        $charge=$stripe->charges()->create([
            'currency' => 'MYR',
            'amount' => $totalcost/100,
        ]);


            dd($charge);
             

        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey(getenv('STRIPE_SECRET_KEY'));

        $charge = \Stripe\Charge::create([
            'amount' => $totalcost,
            'currency' => 'myr',
            'source' => 'tok_visa',
            'receipt_email' => 'pikepeter@gmail.com',
        ]);
            return view('stripe.checkout');    
            dd($charge);
             

    }
public function stripecheckout()
{
    // Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey('sk_test_3krh95EvbbFtt0XBNhzDEMab00yYW4d64O');

        $session = \Stripe\Checkout\Session::create([
          'payment_method_types' => ['card'],
          'line_items' => [[
            'name' => 'Event tickets',
            'description' => 'Tickets for Event X',
            'amount' => 430000,
            'currency' => 'myr',
            'quantity' => 7,
          ]],
          'success_url' => 'https://example.com/success',
          'cancel_url' => 'https://example.com/cancel',
        ]);
}

}

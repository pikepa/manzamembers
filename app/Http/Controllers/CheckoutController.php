<?php

namespace App\Http\Controllers;
use Session;
use App\Booking;
use Stripe\Charge;
use App\BookingItem;
use Stripe\Customer;
use Illuminate\Http\Request;
use App\Mail\BookingConfirmed;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function precheckout()
    {
      $booking=Booking::findOrFail(session::get('booking_id'));
      $totalcost=BookingItem::cost();
      $totaltickets=BookingItem::tickets();

      if($totalcost == 0){
          return redirect('/bookingitems/'.session::get('booking_id'))
          ->withError('You did not add any tickets, your cart was empty!');
      }
      $error=['message'=>''];
        return view('stripe.newcheckout', compact('totalcost','error'));


    }
    public function charge(Request $request)
    {
      $booking=Booking::findOrFail(session::get('booking_id'));
      $totalcost=BookingItem::cost();
      $totaltickets=BookingItem::tickets();

        try {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

            $charged= Charge::create ([
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
            //dd($e); // Network problem, perhaps try again.dd
            $e_json = $e->getJsonBody();
            $error = $e_json['error'];
            Log::info('Problem with the Network.'.$error['message'].' Please try again',['Booking No' => $booking->id]);
            return view('stripe.newcheckout', compact('error','totalcost'));

        } catch (\Stripe\Error\InvalidRequest $e) {
            // dd($e); // You screwed up in your programming. Shouldn't happen!
          $e_json = $e->getJsonBody();
          $error = $e_json['error'];
          Log::stack("Problem with Stripe's servers.".$error['message'],['Booking No' => $booking->id]);
          return view('stripe.newcheckout', compact('error','totalcost'));
          return redirect('/');

        } catch (\Stripe\Error\Api $e) {
            //dd($e); // Stripe's servers are down!
          $e_json = $e->getJsonBody();
          $error = $e_json['error'];
          Log::info("Problem with Stripe's servers.".$error['message'],['Booking No' => $booking->id]);
          return view('stripe.newcheckout', compact('error','totalcost'));

        } catch (\Stripe\Error\Card $e) {
            $e_json = $e->getJsonBody();
            $error = $e_json['error'];
            Log::info('Problem with a card.'.$error['message'],['Booking No' => $booking->id]);
            return view('stripe.newcheckout', compact('error','totalcost'));
        }

        return redirect('/success');
    }

    public function success()
    {
      $booking=Booking::findOrFail(session::get('booking_id'));
      $totalcost=BookingItem::cost()/100;
      $totaltickets=BookingItem::tickets();

      $ccmembers=['manzatourskl@gmail.com','pikepeter@gmail.com'];

      session()->forget(['booking_id', 'event_id']);

      Mail::to($booking->email)
        ->cc($ccmembers)->send(new BookingConfirmed());

       return view('stripe.success', compact('booking'));

    }

    public function sorry()
    {
      $booking=Booking::findOrFail(session::get('booking_id'));
      $totalcost=BookingItem::cost()/100;
      $totaltickets=BookingItem::tickets();

       return view('stripe.success', compact('booking'));

    }

}

<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Receipt;
use App\Cartreceipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function update()
    {
        return redirect('');
    } 
    public function create()
    {
        $receipt = new Receipt;
        $receipt->receipt_date = now();
        return view('cart.receipt.create', compact('receipt'));
    }
    public function store(Request $request)
    {
        $this->validate(request(), [
            'receipt_date' => 'required|date',
            'description' => 'required|min:5',
            'payee' => 'required',
            'receipt_no' => 'required|unique:cartreceipts|numeric|min:0|not_in:0',
            'amount' => 'required|numeric|min:0|not_in:0',
        ]);   

        $cartreceipt = new Cartreceipt;
        $booking = new Booking;
        $booking = session('booking');             
        $booking->confirmed_at = now();
                     
        $booking->receipt_url = env('APP_URL').'/booking/'.$booking->id;

        $cartreceipt->booking_id = $booking->id;
        $cartreceipt->receipt_date = $request->receipt_date;
        $cartreceipt->payee = $request->payee;
        $cartreceipt->description = $request->description;
        $cartreceipt->receipt_no = $request->receipt_no;
        $cartreceipt->amount = $request->amount*100;
        $cartreceipt->owner_id = Auth::user()->id;
          
        $booking->update();                         
        $cartreceipt->save();

        return redirect($booking->receipt_url);
    }
}

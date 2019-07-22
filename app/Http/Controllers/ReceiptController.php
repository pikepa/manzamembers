<?php

namespace App\Http\Controllers;

use App\Receipt;
use App\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceiptController extends Controller
{
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
    public function create($id)
    {
        $membership_id = $id;
        $receipt=Membership::with('receipts','term')->find($id);
         $receipt->date_joined='2019-01-30' ;                                
        return view('receipts.create',compact('membership_id','receipt'));
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
            'date' => 'required|date',
            'payee' => 'required',
            'receipt_no' => 'required|unique:receipts',
            'amount' => 'required',
        ]);   
              
        $receipt = new Receipt;

        $receipt->date = $request->date;
        $receipt->payee = $request->payee;
        $receipt->receipt_no = $request->receipt_no;
        $receipt->amount = $request->amount*100;
        $receipt->owner_id = Auth::user()->id;
        $receipt->membership_id = $request->membership_id;
                             
        $receipt->save();

        return redirect('membership/'.$receipt->membership_id)->with('message', 'Member '.$receipt->id.' has been saved');
                
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show(Receipt $receipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipt $receipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receipt $receipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipt $receipt)
    {
                     
        $receipt->delete();

        return redirect('membership/'.$receipt->membership_id)->with('message', 'Receipt No. '.$receipt->id.' has been deleted');
 
    }
}

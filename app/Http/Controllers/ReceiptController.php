<?php

namespace App\Http\Controllers;

use App\Receipt;
use Carbon\Carbon;
use App\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceiptController extends Controller
{
        /**
     * Restricting certain functions to Auth Users only.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $payee=Membership::findorFail($id);

        $receipt= new Receipt;

        $receipt->date = Carbon::now();  
        $receipt->payee = $payee->surname;  
                                                                                                                                       
        return view('receipts.create',compact('membership_id', 'receipt'));
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
            'mship_term_id' => 'required|numeric|min:0|not_in:0',
            'receipt_no' => 'required|unique:receipts|numeric|min:0|not_in:0',
            'amount' => 'required|numeric|min:0|not_in:0',
        ]);   
              
        $receipt = new Receipt;

        $receipt->date = $request->date;
        $receipt->payee = $request->payee;
        $receipt->mship_term_id = $request->mship_term_id;
        $receipt->receipt_no = $request->receipt_no;
        $receipt->amount = $request->amount*100;
        $receipt->owner_id = Auth::user()->id;
        $receipt->membership_id = $request->membership_id;
                             
        $receipt->save();

        //event(new ReceiptCreated($receipt));

        return redirect('membership/'.$receipt->membership_id)->with('message', 'Receipt '.$receipt->receipt_no.' has been saved');
                
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
        $membership_id=$receipt->membership_id;
        return view('receipts.edit', compact('receipt','membership_id'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receipt $receipt)
    {
       $this->validate(request(), [
            'date' => 'required|date',
            'payee' => 'required',
            'mship_term_id' => 'required|numeric|min:0|not_in:0',
            'receipt_no' => 'required',
            'amount' => 'required|numeric|min:0|not_in:0',
        ]);   
              
        $receipt->date = $request->date;
        $receipt->payee = $request->payee;
        $receipt->mship_term_id = $request->mship_term_id;
        $receipt->receipt_no = $request->receipt_no;
        $receipt->amount = $request->amount*100;
        $receipt->owner_id = Auth::user()->id;
        $receipt->membership_id = $request->membership_id;
                             
        $receipt->update();

        return redirect('membership/'.$receipt->membership_id)->with('message', 'Member '.$receipt->id.' has been saved');
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

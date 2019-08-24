<?php

namespace App\Http\Controllers;

use App\Address;
use App\Receipt;
use Carbon\Carbon;
use App\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Restricting certain functions to Auth Users only.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function index()
    {
        $memberships = Membership::with(['mship','term'])->get()->sortBy('term');
                                 
        return view('memberships.index', compact('memberships'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
// THis is a test site for detemining the staatus of membership

          $dtstart=Carbon::create()->now();
          $mydate=Receipt::with('term')->where('membership_id',144)->get()->last();
        dd($mydate->term->category);
        if($mydate == null){
            return "Expired"  ;
           }
          if ($mydate->receipt_date->year == $dtstart->year
                and 
                $mydate->mship_term_id >= 11){
            $status="Current";
          }else{
            $status="Out of Date";
          }
         dd($status, $mydate->receipt_date, $dtstart,$mydate->receipt_date->lte($dtstart ));
                       
        dd($dtstart->startOfYear());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $membership)
    {
                 
        $membership=Membership::with(['mship','term'])->find($membership->id);  

        $members=$membership->members;

        $receipts=Receipt::with(['term'])->where('membership_id',$membership->id)->get();
        $addresses=Address::where('membership_id',$membership->id)->get();

        return view('memberships.show',compact('membership','members', 'addresses', 'receipts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {
       $membership=Membership::with(['mship','term'])->find($membership->id);  
                       
        return view('memberships.edit',compact('membership'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Membership $membership)
    {
        $request->status =$membership->status;
        $attributes=request()->validate( [
         //   'status' => 'required|min:4',
            'surname' => 'required|min:4',
            'phone' => 'required',
            'email' => 'email|required',
            'mship_term_id'=> 'required',
            'mship_type_id'=> 'required',
        ]);
        $membership->update($attributes);

            return redirect('membership')
            ->with('message', 'Membership '.$membership->memb_no.' has been updated.');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $membership)
    {
        $membership = Membership::find($membership->id);
        $membership->delete();

        return redirect('membership')->with('message', 'Membership '.$membership->memb_no.' has been deleted');
    }
}

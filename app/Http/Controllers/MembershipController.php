<?php

namespace App\Http\Controllers;

use App\Address;
use App\Receipt;
use Carbon\Carbon;
use App\Membership;
use Illuminate\Http\Request;
use App\Jobs\Memberships\UpdateMemberStatus;
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
    {   $report_title = "Membership Listing";
        $memberships = Membership::surnameascending()->with(['mship'])->get();
                                 
        return view('memberships.index', compact('memberships','report_title'));
    }

    public function expired_memberships()
    {   $report_title = "Expired Memberships";
        $memberships = Membership::with(['mship'])
                    ->where('status','Expired')
                    ->orderBy('mship_term','ASC')->surnameascending()->get();
                                 
        return view('memberships.index', compact('memberships','report_title'));
    }

    public function pending_memberships()
    {   $report_title = "Pending Memberships";
        $memberships = Membership::with(['mship'])
                    ->where('status','Pending')
                    ->orderBy('mship_term','ASC')->surnameascending()->get();
                                 
        return view('memberships.index', compact('memberships','report_title'));
    }

    public function current_memberships()
    {   $report_title = "Current Memberships";
        $memberships = Membership::with(['mship'])
                    ->where('status','Current')
                    ->orderBy('mship_term','ASC')->surnameascending()->get();
                                 
        return view('memberships.index', compact('memberships','report_title'));
    }

    public function membs_without_addresses()
    {   $report_title = "Memberships without Addresses";
        $memberships = Membership::doesnthave('addresses')->surnameascending()->get();
        return view('memberships.index', compact('memberships','report_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



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
            'surname' => 'required|min:3',
            'mailing_label' => 'required|min:4',
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
    /** 
    *This is a route to allow manual triggering of the
    *UpdateMemberStatus Job. Normally the job runs nightly.
    **/
    public function memberstatusupdate()
    {
        $this->dispatchNow(new UpdateMemberStatus());
        return redirect ('/')->with('success', 'Membership status job has been streamed');
    }
}

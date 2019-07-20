<?php

namespace App\Http\Controllers;

use App\Member;
use App\Membership;
use Illuminate\Http\Request;

class MemberController extends Controller
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
        $members=Member::get();
        return view('members.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        if(isset($id))
        {
            $membership = $id;
        }
        else
        {
            $membership = null;
        }
      
        return view('members.create',compact('membership'));
    }                

    /**
     * Store a newly created member in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                     
        $this->validate(request(), [
            'surname' => 'required|min:4',
            'firstname' => 'required|min:5',
            'mobile' => 'required',
            'gender' => 'required',
            'email' => 'email|required',
        ]);
         if(!isset($request->membership))
         {    
        $membership = new Membership;
        $membership->surname = $request->surname;
        $membership->phone = $request->mobile;
        $membership->email = $request->email;
        
        $membership->save();
        }
        else
        {
            $membership = Membership::find($request->membership);
        }
        $member = new Member;

        $member->membership_id = $membership->id;
        $member->surname = $request->surname;
        $member->firstname = $request->firstname;
        $member->mobile = $request->mobile;
        $member->email = $request->email;
        $member->gender = $request->gender;
        $member->nationality = $request->nationality;
        
        $member->save();

       return redirect('/membership/')->with('message', 'Member has been added.');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}

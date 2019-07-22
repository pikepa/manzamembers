<?php

namespace App\Http\Controllers;

use App\Member;
use App\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\SpecialClasses\Category_Type;

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
        
        $title=new Category_Type;
        $titles=$title->gettitles();
             
        if(isset($id))
        {
            $membership = $id;
        }
        else
        {
            $membership = null;
        }
      
        return view('members.create',compact('membership','titles'));
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
            'surname' => 'required|min:3',
            'firstname' => 'required|min:1',
            'email' => 'email|required',
            'mobile' => 'required',
            'gender' => 'required',
            'nationality'=> 'required',
        ]);
        if(!isset($request->date_joined)){
            $request->date_joined=now();
        } 
             
         if(!isset($request->membership))
         {    
        $membership = new Membership;
        $membership->old_membership_no = $request->old_membership_no;
        $membership->surname = $request->surname;
        $membership->date_joined = $request->date_joined;
        $membership->phone = $request->mobile;
        $membership->mship_type_id = 2;
        $membership->mship_term_id = 11;
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
        $member->date_joined = $request->date_joined;
        $member->title = $request->title;
        $member->surname = $request->surname;
        $member->firstname = $request->firstname;
        $member->mobile = $request->mobile;
        $member->email = $request->email;
        $member->gender = $request->gender;
        $member->nationality = $request->nationality;
        $member->occupation = $request->occupation;
        $member->company = $request->company;

        $member->save();

        $count=$membership->addresses->count();

        if($count > 0){         
        return redirect('membership/'.$member->membership_id)->with('message', 'Member '.$member->id.' has been added.');
        }
        else{
                      
        return view('addresses.create',compact('membership'));
        }

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
        $title=new Category_Type;
        $titles=$title->gettitles();
        $membership=$member->membership->id;
        return view('members.edit',compact('member','membership','titles'));
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
          $this->validate(request(), [
                    'surname' => 'required|min:3',
                    'firstname' => 'required|min:1',
                    'email' => 'email|required',
                    'mobile' => 'required',
                    'gender' => 'required',
                    'nationality'=> 'required',
                ]); 

        $member->date_joined = $request->date_joined;
        $member->title = $request->title;
        $member->surname = $request->surname;
        $member->firstname = $request->firstname;
        $member->mobile = $request->mobile;
        $member->email = $request->email;
        $member->gender = $request->gender;
        $member->nationality = $request->nationality;
        $member->occupation = $request->occupation;
        $member->company = $request->company;
dd($member);
        $member->update();

        return redirect('membership/'.$member->membership_id)->with('message', 'Member '.$member->id.' has been added.');
                                        
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
     {
        $member->delete();

        return redirect('membership/'.$member->membership_id)->with('message', 'Member '.$member->id.' has been deleted');
    
    }
}

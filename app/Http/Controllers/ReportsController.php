<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Restricting certain functions to Auth Users only.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**date_joined
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function member_listing()
    {
        $members = Member::with('membership')->orderBy('membership_id','desc')->get();
                                                                  
        return view('members.index', compact('members'));

    }
}

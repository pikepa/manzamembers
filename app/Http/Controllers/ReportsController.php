<?php
namespace App\Http\Controllers;
use App\Member;
use App\Receipt;
use App\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    
       public function life_member_listing()
    {
        $members = Member::whereHas('membership', function($q) {
        $q->where('mship_type_id',3);})->orderBy('membership_id','ASC')->get();
  
        return view('members.index', compact('members'));
    }
    
    public function receipt_listing()
    {
        $receipts = Receipt::with('membership','term')
        ->orderBy('receipt_no','DESC')->get();
        return view('receipts.receipt_index', compact('receipts'));
                
    } 
}
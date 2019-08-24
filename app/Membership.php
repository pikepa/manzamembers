<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $dates = ['date_joined','created_at'];

    protected $guarded = [];

   //This calculate the membership term from the 
   // last receipt.
    public function getMemberTerm()
    {
         $receipt=Receipt::with('term')->where('membership_id', $this->id)->get()->last();
          if($receipt == null){
            return "xxx";
          }else{
            return $receipt->term['category'];
          }
    }


    public function getStatus()
    {
          $dtstart=Carbon::create()->now()->submonth(2);
          $mydate=Receipt::where('membership_id', $this->id)->get()->last();
          if($mydate == null){

            return "Expired";
          }
          if ($mydate->receipt_date->year >= $dtstart->year
                and 
                $mydate->mship_term_id == 11){
            return "Current";
          }else{
            return "Pending";
          }
    }

    public function getMembNoattribute()
    {

            return $this->member_no;

    }

    public function getFormattedDateJoinedAttribute()
    {
            return $this->date_joined->format('M j, Y'); 
    }

    public function path()
    {
        return "/membership/{$this->id}";
    }

    public function mship(){
            return $this->belongsTo(Category::class,'mship_type_id','id');}

    public function term(){
            return $this->belongsTo(Category::class,'mship_term_id','id');}

    public function members()
    {
        return $this->hasMany(Member::class, 'membership_id');
    }    

    public function addresses()
    {
        return $this->hasMany(Address::class, 'membership_id');
    }

    public function receipts()
    {
        return $this->hasMany(Receipt::class, 'membership_id');
    }
}

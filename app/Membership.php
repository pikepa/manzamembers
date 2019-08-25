<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $dates = ['date_joined','created_at'];

    protected $guarded = [];


    public function getMembNoattribute()
    {

            return $this->member_no;

    }

    public function scopeSurnameAscending($query)
    {
            return $query->orderBy('surname','asc');
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

    private function setupdates()
    {
      $date = Carbon::create()->now();

        $startOfYear = $date->copy()->startOfYear();
        $endOfYear   = $date->copy()->endOfYear();
        $annualStart = $startOfYear->subMonth(2);
        $firstStart  = $startOfYear->subMonth(2);
        $secondStart = $endOfYear->subMonth(7);
        $midyear     = $endOfYear->subMonth(6);

    }
}

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
        return (10000+$this->id);
    }

    public function getDateJoinedAttribute()
    {
            return $this->created_at->format('M j, Y'); 
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
}

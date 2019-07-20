<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $dates = ['date_joined','created_at'];

    protected $guarded = [];

    public function getDateJoinedAttribute()
    {
            return $this->created_at->format('M j, Y'); 
    }

    public function getFullnameAttribute()
    {
        return ucfirst($this->firstname) . ' ' . ucfirst($this->surname);
    }
    
    public function path()
    {
        return "/member/{$this->id}";
    }


    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }
}

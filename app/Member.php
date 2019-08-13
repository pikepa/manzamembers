<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $dates = ['date_joined', 'created_at'];

    protected $guarded = [];

    public function getFormatDateJoinedAttribute()
    {
        if ($this->date_joined !== null) {
            return $this->date_joined->format('Y-m-d');
        } else {
            return $this->date_joined;
        }
    }

    public function getFullnameAttribute()
    {
        return ucfirst($this->firstname).' '.ucfirst($this->surname);
    }

    public function path()
    {
        return "/member/{$this->id}";
    }

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function receipts()
    {
        return $this->belongsTo(Receipt::class, 'membership_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $dates = ['created_at'];
    protected $guarded = [];


    //Defines a path for a booking
    public function path()
    {
        return "/reservation/{$this->id}";
    }


}

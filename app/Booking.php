<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model{

    protected $dates = ['created_at'];

    protected $guarded = [];


    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    //Defines a path for a booking
    public function cancel()
    {
        foreach ($this->tickets as $ticket){
            $ticket->release();
        }
        $this->delete();
    } 

       //Defines a path for a booking
    public function path()
    {
        return "/booking/{$this->id}";
    }


}


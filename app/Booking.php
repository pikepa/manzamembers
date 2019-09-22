<?php

namespace App;

use App\BookingItem;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model{
    

    protected $dates = ['created_at','confirmed_at'];

    protected $guarded = [];

    public function getFormattedDate($date)
    {
       if($this->$date !== null){
            return $this->$date->toFormattedDateString(); 
        }else{
            return $this->$date;
        }
    }

    public function booking_items()
    {
        return $this->hasMany(BookingItem::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
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

        //Defines the full url for a booking
    public function fullpath()
    {
        return env('APP_URL').$this->path();
    }


}


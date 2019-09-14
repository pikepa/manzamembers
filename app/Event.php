<?php

namespace App;
use App\Reservation;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Event extends Model implements HasMedia
{
    use HasMediaTrait, SoftDeletes;

    
    protected $dates = ['published_at','created_at','date'];

    protected $guarded = [];

    /**
     * Format the message created date.
     */
    public function getDateOfEventAttribute()
    {
        return $this->date->format('l \t\h\e jS M, Y');
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')->where('status', '!=', 'Hidden') ;
    }

    public function scopeActive($query)
    {
        return $query->where('status', '!=', 'Hidden')
                     ->where('status', '!=', 'Pending') ;
    }

    public function isPublished()
    {
        return $this->published_at !== null  ;
    }

    public function isnotPublished()
    {
        return $this->published_at == null;
    }

    public function isMembershipRequired()
    { 
        if($this->memb_na){
         return "NO";
        }
    }

    public function publish()
    {
        $this->update(['published_at' => $this->freshTimestamp()]);
        $this->addTickets($this->ticket_quantity);
    }  



    public function path()
    {
        return "/event/{$this->id}";
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function priceitems()
    {
        return $this->hasMany(priceitem::class, 'event_id');
    }

    public function membpriceitems()
    {
        return $this->hasMany(priceitem::class, 'event_id')->where('memb',1);
    }

    public function nonmembpriceitems()
    {
        return $this->hasMany(priceitem::class, 'event_id')->where('memb',0);
    }

    public function othertickets()
    {
        return $this->hasMany(priceitem::class, 'event_id')->where('memb',0);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'event_id');
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'event_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'event_id');
    }

//  
    public function getPrice($member)
    {
        dd($member);
    }



    public function reserveTickets($quantity, $email)
    {
        $tickets = $this->findTickets($quantity)->each(function ($ticket) {
            $ticket->reserve();
        });
        return new Reservation($tickets, $email);
    }


    public function findTickets($quantity)
    {
        $tickets = $this->tickets()->available()->take($quantity)->get();
        if ($tickets->count() < $quantity) {
            throw new NotEnoughTicketsException;
        }
        return $tickets;
    }


    public function addTickets($quantity)
    {
        foreach (range(1, $quantity) as $i) {
            $this->tickets()->create([]);
        }
        return $this;
    }





    public function bookTickets($email , $quantity)
    {
       dd('im here');
    }


    public function ticketsRemaining()
    {
        return $this->tickets()->available()->count();
    }


    public function ticketsSold()
    {
        return $this->tickets()->sold()->count();
    }


    public function totalTickets()
    {
        return $this->tickets()->count();
    }

    // Media Definitions
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
              ->width(300)
              ->height(300)
              ->sharpen(10);

        $this->addMediaConversion('event')
              ->width(475)
              ->height(660)
              ->sharpen(10);

        $this->addMediaConversion('full')
              ->width(800)
              ->height(800)
              ->sharpen(10);
    }
}

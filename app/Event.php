<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    
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
        return $query->whereNotNull('published_at');
    }

    public function isPublished()
    {
        return $this->published_at !== null;
    }

    public function isnotPublished()
    {
        return $this->published_at == null;
    }

    public function publish()
    {
        $this->update(['published_at' => $this->freshTimestamp()]);
        $this->addTickets($this->ticket_quantity);
    }  
    /**
     * Format the message has a path.
     */
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

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'event_id');
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

        $this->addMediaConversion('full')
              ->width(800)
              ->height(800)
              ->sharpen(10);
    }
}

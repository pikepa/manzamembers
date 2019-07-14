<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = ['created_at','event_date'];

    protected $guarded = [];

    /**
     * Format the message created date.
     */
    public function getDateOfEventAttribute()
    {
        return $this->event_date->format('M j, Y');
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = ['published_at','created_at','date'];

    protected $guarded = [];

    /**
     * Format the message created date.
     */
    public function getDateOfEventAttribute()
    {
        return $this->date->format('l \t\h\e jS M, Y');
    }

    public function isPublished()
    {
        return $this->published_at !== null;
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

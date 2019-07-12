<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = ['created_at'];

    protected $guarded = [];

    /**
     * Format the message created date.
     */
    public function getCreatedDateAttribute()
    {
        return $this->created_at->format('M j, Y');
    }

    /**
     * Format the message has a path.
     */
    public function path()
    {
        return "/event/{$this->id}";
    }
}

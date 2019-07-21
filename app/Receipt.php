<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $dates = ['date','created_at'];
    protected $guarded = [];

    public function getFormattedReceiptDateAttribute()
    {
            return $this->date->format('M j, Y'); 
    }


        public function membership()
    {
        return $this->belongsTo(Membership::class);
    }
        public function owner()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Format the message has a path.
     */
    public function path()
    {
        return "/receipt/{$this->id}";
    }
}

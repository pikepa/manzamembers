<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priceitem extends Model
{
    protected $dates = ['created_at'];

    protected $guarded = [];
    
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    
    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function path()
    {
        return "/address/{$this->id}";
    }
}

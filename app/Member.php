<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }
}

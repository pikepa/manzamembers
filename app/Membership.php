<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $dates = ['date_joined','created_at'];

    protected $guarded = [];

    public function memb_no()
    {

        return "{$this->date_joined->year}{$this->id}";
    }

    public function path()
    {
        return "/membership/{$this->id}";
    }

}

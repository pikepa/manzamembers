<?php

namespace App;

use App\Event;
use App\Priceitem;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $dates = ['created_at'];

    protected $guarded = [];

    //
    public function events()
    {
        return $this->belongsToMany(Event::class)->orderBy('publish_at', 'desc');
    }

    public function priceitems()
    {
        return $this->hasMany(Priceitem::class, 'price_type_id');
    }

    public function path()
    {
        return "/category/{$this->id}";
    }

}

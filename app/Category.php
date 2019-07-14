<?php

namespace App;

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
        return $this->hasMany(priceitem::class, 'price_item_id');
    }

    public function path()
    {
        return "/category/{$this->id}";
    }

}

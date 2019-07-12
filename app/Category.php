<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $dates = ['created_at'];

    protected $guarded = [];

    //
    public function products()
    {
        return $this->belongsToMany(Product::class)->orderBy('publish_at', 'desc');
    }

    public function path()
    {
        return "/category/{$this->id}";
    }
}

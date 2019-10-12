<?php

namespace App;

use App\User;
use App\Event;
use App\Category;
use Session;
use Illuminate\Database\Eloquent\Model;

class Priceitem extends Model
{
    protected $dates = ['created_at'];

    protected $guarded = [];
    
    public function getFormattedPriceattribute()
    {
        return 'RM '.number_format(($this->price)/100,2,'.', ',');

    }

    public function scopeMembers($query)
    {
        return $query->where('memb',1)->where('visible','yes')->where('event_id',session::get('event_id',0));
    }

    public function scopeNonmembers($query)
    {
        return $query->where('memb',0)->where('visible','yes')->where('event_id',session::get('event_id',0));
    }

    public function scopeOthers($query)
    {
        return $query->where('memb',2)->where('visible','yes')->where('event_id',session::get('event_id',0));
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'price_type_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }


    public function path()
    {
        return "/priceitem/{$this->id}";
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class BookingItem extends Model
{
    protected $dates = ['created_at'];

    protected $guarded = [];

    public function getDisplayCostattribute()
    {
        return 'RM '.number_format((($this->price)*$this->qty)/100,2,'.', ',');
    }
    public function getCostattribute()
    {
        return ($this->price)*($this->qty);
    }

    public function scopeCost($query)
    {        
        return $query->where('booking_id',session::get('booking_id',0))->get()->sum('cost');
    }
 
    public function scopeTickets($query)
    {        
        return $query->where('booking_id',session::get('booking_id',0))->get()->sum('qty');
    }
 
    public function scopeTables($query)
    {        
        return $query->where('booking_id',session::get('booking_id',0))
        ->where('price_type_id',15 )->get()->sum('qty');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class,'price_type_id');
    }

    public function priceitems()
    {
        return $this->belongsTo(Priceitem::class,'price_item_id');
    }

    public function path()
    {
        return "/bookingitems/{$this->id}";
    }
}

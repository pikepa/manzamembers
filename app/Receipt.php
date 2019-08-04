<?php

namespace App;

use App\Member;
use App\Receipt;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $dates = ['date','created_at'];
    protected $guarded = [];

    public function getFormattedReceiptDateAttribute()
    {
            return $this->date->format('M j, Y'); 
    }


    public function getFormattedAmountAttribute()
    {
            return number_format($this->amount/100,2,'.', ',');; 
    }

        public function term()
        {
        return $this->belongsTo(Category::class,'mship_term_id','id');
    }


        public function membership()
    {
        return $this->belongsTo(Membership::class);
    }
        public function owner()
    {
        return $this->belongsTo(User::class);
    }
       public function member()
    {
        return $this->belongsTo(Member::class);
    }
    /**
     * Format the message has a path.
     */
    public function path()
    {
        return "/receipt/{$this->id}";
    }
}

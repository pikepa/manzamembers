<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cartreceipt extends Model
{
    public function getDisplayAmountattribute()
    {
        return 'RM '.number_format(($this->amount)/100,2,'.', ',');
    }}

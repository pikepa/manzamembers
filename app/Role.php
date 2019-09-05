<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    

    //Defines a path for a role
    public function path()
    {
        return "/roles/{$this->id}";
    }

}

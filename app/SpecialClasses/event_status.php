<?php
 
namespace App\SpecialClasses;
 
class Event_Status {
    
    public function getstatus() 
    {
        return [
        'Pending'=>'Pending',
        'Published'=>'Published',
        'Open'=>'Open',
        'Sold Out'=>'Sold Out',
        'Closed'=>'Closed',
        'Hidden'=>'Hidden',
        ];
    }     

}

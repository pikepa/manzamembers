<?php
 
namespace App\SpecialClasses;
 
class Category_Type {
    
      public function gettypes() {
        return [
        'MEM'=>'Membership Type',
        'EVT'=>'Event Type',
        'PRI'=>'Pricing Type',
        'TRM'=>'Membership Term',
        ];
        }     

        public function gettitles() {
        return [
        'Mr',
        'Mrs',
        'Ms',
        'His Excellency',
        'His Excellency, The Ambassador',
        ];
        }
}

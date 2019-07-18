<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Member;
use Faker\Generator as Faker;

$factory->define(Member::class, function (Faker $faker) {
    
    $gender = $faker->randomElement(['male', 'female']);
    return [
        'membership_id'=>'1',
        'surname' => $faker->lastname,
        'firstname' => $faker->firstname,
        'gender' => $gender,
        'occupation' => $faker->jobTitle,
        'nationality' =>'Australian',
        'mobile' =>$faker->phoneNumber ,
        'email' =>$faker->unique()->safeEmail,   
        ];
});

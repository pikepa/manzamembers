<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Membership;
use Faker\Generator as Faker;

$factory->define(Membership::class, function (Faker $faker) {
    return [
        'date_joined' => $faker->date,
        'surname' => $faker->lastname,
        'membership_type' =>1,
        'term' => 99,
        'phone' =>$faker->phoneNumber ,
        'email' =>$faker->unique()->safeEmail,
        ];
});

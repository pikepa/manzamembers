<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Membership;
use Faker\Generator as Faker;

$factory->define(Membership::class, function (Faker $faker) {
    return [
        'date_joined' => $faker->date,
        'status' => 'Pending',
        'surname' => $faker->lastname,
        'phone' =>$faker->phoneNumber ,
        'email' =>$faker->unique()->safeEmail,
        ];
});

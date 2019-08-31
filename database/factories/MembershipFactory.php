<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Membership;
use Faker\Generator as Faker;

$factory->define(Membership::class, function (Faker $faker) {
    return [
        'date_joined' => $faker->date,
        'status' => 'Pending',
        'surname' => $faker->lastname,
        'mailing_label' => $faker->lastname,
        'mship_type_id' => 4,
        'mship_term_id' => 11,
        'phone' =>$faker->phoneNumber ,
        'email' =>$faker->unique()->safeEmail,
        ];
});

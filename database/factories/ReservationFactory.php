<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use App\Reservation;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        'event_id'  => factory(Event::class)->create()->id,
        'name'      => $faker->name,
        'mobile'      => $faker->e164PhoneNumber,
        'email'     => $faker->unique()->safeEmail,
        'res_qty'   => $faker->numberBetween($min = 1, $max = 10)
   ];
});

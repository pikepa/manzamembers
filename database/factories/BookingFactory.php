<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use App\Booking;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {
    return [
        'event_id' => factory(Event::class)->create()->id,
        'email' => $faker->unique()->safeEmail,
        'name' => $faker->name,
        'memb_no' => $faker->randomDigitNotNull,
        ];
});

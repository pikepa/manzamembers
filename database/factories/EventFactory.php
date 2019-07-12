<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->unique()->safeEmail,
        'date' => $faker->date,
        ];
});

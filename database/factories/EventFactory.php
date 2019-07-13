<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'featured_img' => $faker->url,
        'title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'description' =>$faker->paragraph,
        'event_date' => $faker->dateTimeBetween('+1 week', '+1 month'),
        'status' =>$faker->randomElement(['For Sale', 'Sold', 'Not for Sale']),
        'price' =>$faker->numberBetween(10000, 50000),
        'discount' =>'0',
        'publish_at' =>$faker->date,
    ];
});

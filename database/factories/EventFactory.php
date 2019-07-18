<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'featured_img' => '/images/uploads/MANZA-Dinner-Club-Flyer-Aug19.jpg',
        'title' => $faker->words($nb = 2, $asText = true) ,
        'description' =>$faker->paragraph,
        'event_date' => $faker->dateTimeBetween('+1 week', '+1 month'),
        'status' =>$faker->randomElement(['For Sale', 'Sold', 'Not for Sale']),
        'price' =>$faker->numberBetween(10000, 50000),
        'discount' =>'0',
        'publish_at' =>$faker->date,
    ];
});

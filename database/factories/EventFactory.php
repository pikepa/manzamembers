<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'featured_img' => '/images/uploads/MANZA-Dinner-Club-Flyer-Aug19.jpg',
        'title' => $faker->words($nb = 2, $asText = true),
        'description' =>$faker->paragraph,
        'venue' =>$faker->paragraph,
        'v_address' =>$faker->paragraph,
        'date' => $faker->dateTimeBetween('+1 week', '+1 month'),
        'timing' =>$faker->paragraph,
        'status' =>$faker->randomElement(['For Sale', 'Sold', 'Not for Sale']),
        'published_at' =>$faker->date,
    ];
});

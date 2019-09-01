<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\BookingItem;
use Faker\Generator as Faker;

$factory->define(BookingItem::class, function (Faker $faker) {
    return [
        'booking_id' => 1,   
        'price_item_id' => $faker->randomDigitNotNull,
        'price_type_id' => $faker->randomDigitNotNull,
        'price' => $faker->randomDigitNotNull,
        'qty' => $faker->randomDigitNotNull,
         ];
});

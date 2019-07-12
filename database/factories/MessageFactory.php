<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'subject' => $faker->sentence,
        'content' => $faker->paragraph, ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Booking;
use App\Cartreceipt;
use Faker\Generator as Faker;

$factory->define(Cartreceipt::class, function (Faker $faker) {
    return [
        'owner_id' => factory(User::class)->create()->id,
        'booking_id' => factory(Booking::class)->create()->id,
        'receipt_date' =>'2019-02-01',
        'payee' => $faker->name,
        'receipt_no' =>'12345',
        'description' => $faker->paragraph,
        'amount' => '10000',
        'source' => 'Cartcash'
      ];
});

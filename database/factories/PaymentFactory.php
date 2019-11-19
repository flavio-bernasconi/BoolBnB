<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Payment;

$factory->define(Payment::class, function (Faker $faker) {
    return [
      'price' => $faker->unique()->randomElement($array = array ('2.99','5.99','9.99'))


    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Flat;


$factory->define(Flat::class, function (Faker $faker) {
    return [
        'views' => rand(1,100),
        'rate' => $faker -> randomFloat(1, 1, 5)
    ];
});

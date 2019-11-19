<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Detail;

$factory->define(Detail::class, function (Faker $faker) {
    return [
      'title' => $faker -> word,
      'num_room' => rand(1,12),
      'title' => $faker -> word,
      'bed' => rand(1,30),
      'bathroom' => rand(1,8),
      'mq' => rand(1,1230),
      'img' => "default.jpg"
    ];
});

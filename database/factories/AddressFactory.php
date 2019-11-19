<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Address;


$factory->define(Address::class, function (Faker $faker) {
    return [
      'state'=> $faker -> country,
      'city'=> $faker -> city,
      'road'=> $faker -> streetName,
      'civ_num'=> rand(1, 300) ,
      'cap'=> rand(1000, 4000) ,
      'lat'=> $faker -> latitude(-90, 90),
      'lon'=> $faker -> longitude( -180, 180),
    ];
});

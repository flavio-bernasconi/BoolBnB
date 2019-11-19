<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Message;
$factory->define(Message::class, function (Faker $faker) {
    return [
        "msg" => $faker -> text(400),
        "email" => $faker -> email
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\House;
use Faker\Generator as Faker;

$factory->define(House::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'address' => $faker->address,
        'poster' => 'https://picsum.photos/200/300?nocache='.microtime(),
        'description' => $faker->text,
    ];
});

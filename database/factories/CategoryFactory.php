<?php

use Faker\Generator as Faker;

$factory->define(AizaBoutique\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'description' => $faker->sentence
    ];
});

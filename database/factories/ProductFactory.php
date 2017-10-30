<?php

use Faker\Generator as Faker;

$factory->define(\App\Eloquent\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'ceo_keywords' => implode(", " ,$faker->words(4, false)),
        'advantage' => $faker->realText,
        'coordination' => $faker->realText,
        'information' => $faker->realText,
        'conduct' => $faker->realText,
        'produce' => $faker->realText,
        'locked' => rand(0, 1),
    ];
});

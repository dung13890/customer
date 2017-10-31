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
        'feature_1' => 'KT. chậu: 1050 x 450 x 235 mm',
        'produce' => 'KT. hố chậu: 1030 x 430 mm',
        'locked' => rand(0, 1),
    ];
});

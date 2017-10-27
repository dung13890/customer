<?php

use Faker\Generator as Faker;

$factory->define(App\Eloquent\Category::class, function (Faker $faker) {

    return [
        'name' => $faker->jobTitle,
        'type' => $faker->randomElement(config('common.category.type')),
        'description' => $faker->realText,
        'locked' => rand(0, 1),
    ];
});

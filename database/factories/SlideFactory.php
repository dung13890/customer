<?php

use Faker\Generator as Faker;

$factory->define(App\Eloquent\Slide::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\vi_VN\Address($faker));
    return [
        'name' => $faker->country,
        'description' => $faker->streetAddress,
        'locked' => rand(0, 1),
    ];
});

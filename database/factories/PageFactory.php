<?php

use Faker\Generator as Faker;

$factory->define(App\Eloquent\Page::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'ceo_keywords' => implode(", " ,$faker->words(4, false)),
        'description' => $faker->realText,
        'locked' => rand(0, 1),
        'type' => $faker->randomElement(config('common.page.type')),
        'create_dt' => $faker->date(),
    ];
});

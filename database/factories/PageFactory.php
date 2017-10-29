<?php

use Faker\Generator as Faker;

$factory->define(App\Eloquent\Page::class, function (Faker $faker) {
    $categories = app(App\Eloquent\Category::class)->where('type', 'page')->where('parent_id', 0)->get();

    return [
        'name' => $faker->jobTitle,
        'description' => $faker->realText,
        'locked' => rand(0, 1),
        'category_id' => $categories->pluck('id')->random(),
    ];
});

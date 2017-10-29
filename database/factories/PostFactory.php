<?php

use Faker\Generator as Faker;

$factory->define(App\Eloquent\Post::class, function (Faker $faker) {
    $categories = app(App\Eloquent\Category::class)->where('type', 'post')->where('parent_id', 0)->get();

    return [
        'name' => $faker->jobTitle,
        'ceo_keywords' => implode(", " ,$faker->words(4, false)),
        'description' => $faker->realText,
        'locked' => rand(0, 1),
        'category_id' => $categories->pluck('id')->random(),
    ];
});

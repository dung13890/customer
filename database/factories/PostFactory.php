<?php

use Faker\Generator as Faker;

$factory->define(App\Eloquent\Post::class, function (Faker $faker) {
    $category = app(App\Eloquent\Category::class)->whereIn('type', ['post', 'article'])->get()->random();
    return [
        'name' => $faker->jobTitle,
        'ceo_keywords' => implode(", " ,$faker->words(4, false)),
        'description' => $faker->realText,
        'locked' => rand(0, 1),
        'category_id' => $category->id,
        'type' => $category->type,
    ];
});

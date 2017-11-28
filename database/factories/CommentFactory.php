<?php

use Faker\Generator as Faker;
use App\Eloquent\Comment;

$factory->define(Comment::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\vi_VN\Person($faker));
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'content' => $faker->sentence,
        'url' => '/bai-viet/buoi-giao-luu-va-chuc-mung-sinh-nhat-can-bo-nhan-vien-nha-may-toan-thang',
        'commentable_type' => 'App\Eloquent\Post',
        'commentable_id' => 2,
    ];
});

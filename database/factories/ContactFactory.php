<?php

use Faker\Generator as Faker;

$factory->define(\App\Eloquent\Contact::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\vi_VN\Person($faker));

    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'description' => $faker->text,
        'locked' => rand(0, 1),
    ];
});

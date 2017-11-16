<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Eloquent\User::class, function (Faker $faker) {
    static $password;

    $faker->addProvider(new \Faker\Provider\vi_VN\Person($faker));

    return [
        'name' => $faker->name,
        'username' => str_random(9),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = 'secret',
        'remember_token' => str_random(10),
    ];
});

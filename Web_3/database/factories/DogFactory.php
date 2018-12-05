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



$factory->define(App\Dog::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'bread' =>str_random(10),
        'sex' => str_random(10),
        'years' => rand(0, 15),
        'months' => rand(0, 12),
        'body' =>str_random(10),
        'user_id'=>rand(0,12),
        'some_image'=> $faker->image('public/storage/images',400,300, null, false),
    ];
});

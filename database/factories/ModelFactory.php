<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Place::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => 'SP',

    ];
});

$factory->define(App\Models\Faq::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description' => implode(' ', $faker->paragraphs),
    ];
});

$factory->define(App\Models\Lottery::class, function (Faker\Generator $faker) {
    return [
        'date' => $faker->date('2019-01-03'),
        'time' => $faker->time('H:i'),
        'number' => $faker->numberBetween(100000, 999999),
        'kina' => $faker->numberBetween(50, 150),
        'keno' => $faker->numberBetween(100, 500),
        'price' => '2.50',

        //'card_kina' => $faker->numberBetween(100000, 999999),
        //'card_keno' => $faker->numberBetween(100000, 999999),
    ];
});

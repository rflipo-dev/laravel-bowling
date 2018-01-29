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
$factory->define(Bowling\Entity\Role::class, function (Faker\Generator $faker) {
    return [
        'name'  => $faker->word,
        'label' => $faker->sentence
    ];
});

$factory->define(Bowling\Entity\User::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => 'password',
        'remember_token' => str_random(10),
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'username' => $faker->lastName,
    ];
});
$factory->define(Bowling\Entity\Game::class, function (Faker\Generator $faker) {
    return [
        'status' => $faker->randomElement(['pendingPlayers', 'running', 'finished']),
    ];
});
$factory->define(Bowling\Entity\Frame::class, function (Faker\Generator $faker) {
    return [
        'game_id' => $faker->randomDigitNotNull,
    ];
});
$factory->define(Bowling\Entity\Launch::class, function (Faker\Generator $faker) {
    return [
        'frame_id' => $faker->randomDigitNotNull,
        'score' => $faker->randomDigitNotNull,
    ];
});

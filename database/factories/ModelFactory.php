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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Provider\Base;
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'alias' => $faker->realText(rand(10, 20)),
    ];
});

$factory->define(App\Models\Item::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'category_id' => $faker->numberBetween(1, 100),
        'alias' => $faker->realText(rand(10, 20)),
        'price' => $faker->randomFloat(null, 7000000, 20000000),
        'detail' => $faker->realText(rand(30, 40)),
        'avatar' => '58af19b833d5a.jpg',
        'description' => $faker->realText(rand(60, 100)),
        'guarantee' => $faker->numberBetween(1, 5),
        'made' => $faker->country,
    ];
});

$factory->state(App\Models\User::class, 'admin', function ($faker) {
    return [
        'role_id' => 1,
    ];
});

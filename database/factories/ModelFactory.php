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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\UserPhone::class, function (Faker\Generator $faker) {
    return [
        'user_id' => rand(1, 50),
        'phone' => $faker->phoneNumber,
        'phone2' => $faker->phoneNumber,
        'ddd' => str_random(2),
    ];
});

$factory->define(Modules\Admin\Entities\Page::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->text,
        'html' => $faker->text,
    ];
});

$factory->define(Modules\Admin\Entities\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
    ];
});

$factory->define(Modules\Admin\Entities\Message::class, function (Faker\Generator $faker) {
    return [
        'author' => $faker->name,
        'title' => $faker->text,
        'body' => $faker->text,
    ];
});

<?php
use Carbon\Carbon;

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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Ticket::class, function (Faker\Generator $faker) {
    return [
        'subject' => $faker->sentence(5),
        'summary' => $faker->paragraph(2),
        'user_id' => App\User::inRandomOrder()->first(),
        'created_at' => Carbon::now(),
    ];
});

$factory->define(App\TicketComment::class, function (Faker\Generator $faker) {
    return [
        'content' => $faker->sentence(5),
        'user_id' => App\User::inRandomOrder()->first(),
        'ticket_id' => App\Ticket::inRandomOrder()->first(),
        'created_at' => Carbon::now(),
    ];
});
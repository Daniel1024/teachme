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

use TeachMe\Entities\Ticket;
use TeachMe\Entities\TicketComment;
use TeachMe\Entities\TicketVote;
use TeachMe\Entities\User;

$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Ticket::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'status' => $faker->randomElement(['open', 'open', 'closed']),
        //'user_id' => rand(1, 50),
    ];
});

$factory->define(TicketVote::class, function (Faker\Generator $faker) {
    return [
        'user_id'   => rand(1, 50),
        'ticket_id' => rand(1, 50),
        //'user_id' => rand(1, 50),
    ];
});

$factory->define(TicketComment::class, function (Faker\Generator $faker) {
    return [
        'user_id'   => rand(1, 50),
        'ticket_id' => rand(1, 50),
        'comment'   => $faker->paragraph,
        'link'      => $faker->randomElement(['','',$faker->url])
        //'user_id' => rand(1, 50),
    ];
});

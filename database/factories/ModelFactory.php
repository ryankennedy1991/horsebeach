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

use Carbon\Carbon;
    

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => 'test name',
        'email' => 'test2@hotmail.co.uk',
        'password' => bcrypt('tyuuisk3'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Event::class, function (Faker\Generator $faker) {

    return [
        'id' => 999,
        'event_title' => 'Test Event',
        'location' => 'Test Location',
        'event_begin' => Carbon::now()->toDateString(),
        'event_end' => Carbon::now()->toDateString(),
        'description' => 'Test Description',
        'fee' => '100',
        'confirmed' => true,
        'colour' => 'red'
    ];
});

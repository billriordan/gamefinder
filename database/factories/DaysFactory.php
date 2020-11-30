<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Day::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,100),
        'date' => new Carbon('+' . rand(0,625) . ' days')
    ];
});

<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Like;
use App\Question;
use App\User;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    return [
        'question_id' => function () {
            return Question::all()->random();
        },
        'user_id' => function () {
            return User::all()->random();
        }
    ];
});

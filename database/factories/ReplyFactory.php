<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Reply::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph,
        'user_id' => function(){
            return App\User::all()->random();
        },
        'comment_id' => function(){
            return App\Model\Comment::all()->random();
        }
    ];
});

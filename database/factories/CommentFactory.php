<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph,
        'user_id' => function(){
            return App\User::all()->random();
        },
        'news_id' => function(){
            return App\Model\News::all()->random();
        }
    ];
});

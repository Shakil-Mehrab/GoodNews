<?php

use Faker\Generator as Faker;

$factory->define(App\Model\News::class, function (Faker $faker) {
    return [
       	'heading' => $faker->sentence,
        'media' => $faker->word,
        'description' => $faker->paragraph,
        'image' => $faker->imageUrl,
        'views' => $faker->numberBetween(1,100),
        'user_id' => function(){
            return App\User::all()->random();
        },
        'category_id' => function(){
            return App\Model\Category::all()->random();
        }
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {

    $user = (new \App\User)->inRandomOrder()->first();

    return [
        'created_user_id' => $user->id,
        'title' => $faker->realText(90),
        'body' => $faker->text(300)
    ];
});

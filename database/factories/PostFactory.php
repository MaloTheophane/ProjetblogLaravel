<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Post::class, function (Faker $faker) {
	 $users = App\User::pluck('id')->toArray();
    return [
        
        'post_author' => $faker->randomElement($users),
        'post_date' => now(),
        'post_content' => $faker->paragraph(),
        'post_title' => $faker->sentence(),
        'post_name' => $faker->word(),
        'post_type' => 'article',
       
    ];
});

<?php
use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
 $posts = App\Post::pluck('id')->toArray();
     $users = App\User::pluck('name')->toArray();

    return [
        'post_id' => $faker->randomElement($posts),
        'comment_name' => $faker->randomElement($users),
        'comment_email' => $faker->email(),
        'comment_content' => $faker->sentence(),
        'comment_date' => now(),
    ];
});

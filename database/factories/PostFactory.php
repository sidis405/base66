<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $title = $faker->unique()->sentence;

    return [
        'title' => $title,
        'slug' => str_slug($title),
        'body' => join(' ', $faker->paragraphs(5)),
        'user_id' => factory(App\User::class)->make(),
        'category_id' => factory(App\Category::class)->make(),
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->word(),
        'content' => $faker->realText(5000, 2),
        'featured_image' => $faker->imageUrl('750', '300', 'cats')
    ];
});

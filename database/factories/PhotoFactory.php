<?php

use Faker\Generator as Faker;

$factory->define(\App\Photo::class, function (Faker $faker) {
    return [
        "name" => $faker->name(),
        "image" => $faker->image(
            storage_path("app/"),
            640, 480,
            "cats"
        )
    ];
});

<?php

$factory->define(App\Famille::class, function (Faker\Generator $faker) {
    return [
        "nom" => $faker->name,
    ];
});

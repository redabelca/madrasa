<?php

$factory->define(App\Lienparente::class, function (Faker\Generator $faker) {
    return [
        "label" => $faker->name,
    ];
});

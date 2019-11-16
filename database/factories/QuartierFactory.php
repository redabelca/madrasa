<?php

$factory->define(App\Quartier::class, function (Faker\Generator $faker) {
    return [
        "label" => $faker->name,
    ];
});

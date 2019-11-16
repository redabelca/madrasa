<?php

$factory->define(App\Niveau::class, function (Faker\Generator $faker) {
    return [
        "label_fr" => $faker->name,
        "label_ar" => $faker->name,
    ];
});

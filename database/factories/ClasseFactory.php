<?php

$factory->define(App\Classe::class, function (Faker\Generator $faker) {
    return [
        "code" => $faker->name,
        "label_fr" => $faker->name,
        "idmassar" => $faker->name,
        "capacite" => $faker->randomNumber(2),
        "niveau_id" => factory('App\Niveau')->create(),
        "branche_id" => factory('App\Branche')->create(),
    ];
});

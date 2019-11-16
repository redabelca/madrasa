<?php

$factory->define(App\Anneescolaire::class, function (Faker\Generator $faker) {
    return [
        "datedebut" => $faker->date("d/m/Y", $max = 'now'),
        "datefin" => $faker->date("d/m/Y H:i:s", $max = 'now'),
        "label" => $faker->name,
        "anneeactive" => 0,
    ];
});

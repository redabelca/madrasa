<?php

$factory->define(App\Inscription::class, function (Faker\Generator $faker) {
    return [
        "dateentree" => $faker->date("d/m/Y H:i:s", $max = 'now'),
        "interne" => 0,
        "classe_id" => factory('App\Classe')->create(),
        "circuit_id" => factory('App\Circuit')->create(),
        "niveau_id" => factory('App\Niveau')->create(),
        "anneescolaire_id" => factory('App\Anneescolaire')->create(),
        "preinscription_id" => factory('App\Preinscription')->create(),
    ];
});

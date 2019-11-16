<?php

$factory->define(App\Preinscription::class, function (Faker\Generator $faker) {
    return [
        "nomprofesseurtest" => $faker->name,
        "notetest" => $faker->randomFloat(2, 1, 100),
        "resultattest" => $faker->name,
        "is_acceptedintest" => 0,
        "fraistest" => $faker->randomNumber(2),
        "fraispayed" => 0,
        "transport" => 0,
        "datetest" => $faker->date("d/m/Y H:i:s", $max = 'now'),
        "datelimiteinscription" => $faker->date("d/m/Y H:i:s", $max = 'now'),
        "observations" => $faker->name,
        "anneescolaire_id" => factory('App\Anneescolaire')->create(),
        "eleve_id" => factory('App\Eleve')->create(),
    ];
});

<?php

$factory->define(App\Tuteur::class, function (Faker\Generator $faker) {
    return [
        "prenom_fr" => $faker->name,
        "prenom_ar" => $faker->name,
        "nom_fr" => $faker->name,
        "nom_ar" => $faker->name,
        "adresse" => $faker->name,
        "cin" => $faker->name,
        "email" => $faker->name,
        "tel" => $faker->name,
        "ville" => $faker->name,
        "profession" => $faker->name,
        "lienparente_id" => factory('App\Lienparente')->create(),
        "famille_id" => factory('App\Famille')->create(),
    ];
});

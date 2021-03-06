<?php

$factory->define(App\Eleve::class, function (Faker\Generator $faker) {
    return [
        "matricule" => $faker->name,
        "prenom_fr" => $faker->name,
        "prenom_ar" => $faker->name,
        "nom_fr" => $faker->name,
        "nom_ar" => $faker->name,
        "sexe" => $faker->randomNumber(2),
        "cin" => $faker->name,
        "cne" => $faker->name,
        "idmassar" => $faker->name,
        "tel" => $faker->name,
        "adresse" => $faker->name,
        "datenaissance" => $faker->date("d/m/Y", $max = 'now'),
        "datepremiereentree" => $faker->date("d/m/Y", $max = 'now'),
        "email" => $faker->safeEmail,
        "nationalite" => $faker->name,
        "groupesangin" => $faker->name,
        "is_handicaped" => 0,
        "pediatrenom" => $faker->name,
        "telpediatre" => $faker->name,
        "allergies" => $faker->name,
        "particularites" => $faker->name,
        "traitement" => $faker->name,
        "nbreanneedouble" => $faker->randomNumber(2),
        "allergiealimentaire" => $faker->name,
        "intolerancealimentaire" => $faker->name,
        "comportementalimentaire" => $faker->name,
        "famille_id" => factory('App\Famille')->create(),
        "tuteur_id" => factory('App\Tuteur')->create(),
        "quartier_id" => factory('App\Quartier')->create(),
    ];
});

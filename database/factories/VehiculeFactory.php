<?php

$factory->define(App\Vehicule::class, function (Faker\Generator $faker) {
    return [
        "code" => $faker->name,
        "marque" => $faker->name,
        "matricule" => $faker->name,
        "datemiseencirculation" => $faker->date("d/m/Y H:i:s", $max = 'now'),
        "dateacquisition" => $faker->date("d/m/Y H:i:s", $max = 'now'),
        "echeanceassurance" => $faker->date("d/m/Y H:i:s", $max = 'now'),
        "nombredeplace" => $faker->randomNumber(2),
        "echeancevisitetechnique" => $faker->date("d/m/Y H:i:s", $max = 'now'),
        "echeanceautorisation" => $faker->date("d/m/Y H:i:s", $max = 'now'),
        "consommationmin" => $faker->randomNumber(2),
        "consommationmax" => $faker->randomNumber(2),
        "vidange" => $faker->randomNumber(2),
        "observations" => $faker->name,
    ];
});

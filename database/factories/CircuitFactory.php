<?php

$factory->define(App\Circuit::class, function (Faker\Generator $faker) {
    return [
        "label" => $faker->name,
        "vehicule_id" => factory('App\Vehicule')->create(),
    ];
});

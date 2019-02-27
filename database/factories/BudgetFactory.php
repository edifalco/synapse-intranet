<?php

$factory->define(App\Budget::class, function (Faker\Generator $faker) {
    return [
        "project_id" => factory('App\Project')->create(),
        "category_id" => factory('App\Category')->create(),
        "year_id" => factory('App\Year')->create(),
        "amount" => $faker->randomFloat(2, 1, 100),
    ];
});

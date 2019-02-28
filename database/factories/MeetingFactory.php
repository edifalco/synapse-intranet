<?php

$factory->define(App\Meeting::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "project_id" => factory('App\Project')->create(),
        "city" => $faker->name,
        "start_date" => $faker->date("d-m-Y", $max = 'now'),
        "end_date" => $faker->date("d-m-Y", $max = 'now'),
        "status_id" => factory('App\Status')->create(),
    ];
});

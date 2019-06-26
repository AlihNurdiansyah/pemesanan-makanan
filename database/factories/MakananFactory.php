<?php

$factory->define(App\Makanan::class, function (Faker\Generator $faker) {
    return [
        "stok" => $faker->randomNumber(2),
        "deskripsi" => $faker->name,
    ];
});

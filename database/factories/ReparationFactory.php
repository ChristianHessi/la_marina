<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Reparation;
use Faker\Generator as Faker;

$factory->define(Reparation::class, function (Faker $faker) {

    return [
        'motif' => $faker->word,
        'date' => $faker->word,
        'montant' => $faker->randomDigitNotNull,
        'observations' => $faker->text,
        'chambre_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

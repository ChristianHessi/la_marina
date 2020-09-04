<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Locataire;
use Faker\Generator as Faker;

$factory->define(Locataire::class, function (Faker $faker) {

    return [
        'nom' => $faker->word,
        'tel' => $faker->word,
        'email' => $faker->word,
        'date_entree' => $faker->word,
        'actif' => $faker->word,
        'chambre_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Loyer;
use Faker\Generator as Faker;

$factory->define(Loyer::class, function (Faker $faker) {

    return [
        'montant' => $faker->randomDigitNotNull,
        'date_versement' => $faker->word,
        'debut' => $faker->word,
        'fin' => $faker->word,
        'locataire_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

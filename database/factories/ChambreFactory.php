<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Chambre;
use Faker\Generator as Faker;

$factory->define(Chambre::class, function (Faker $faker) {

    return [
        'code' => $faker->word,
        'etage' => $faker->randomDigitNotNull,
        'montant_loyer' => $faker->randomDigitNotNull,
        'description' => $faker->text,
        'batiment_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

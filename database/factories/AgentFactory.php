<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Agent;
use Faker\Generator as Faker;

$factory->define(Agent::class, function (Faker $faker) {
    return [
        'etat_id' => 1,
        'type_agent_id' => 1,
        'nomAgent' => $faker->name,
        'prenomAgent' => $faker->name,
        'sexeAgent' => $faker->name($gender = 'male'|'female'),
        'dateNaisAgent' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'lieuNaisAgent' =>$faker->city,
        'sitMatAgent' => $faker->name,
        'nationAgent' => $faker->name,
        'ethnieAgent' => $faker->name,
        'VillageOrigineAgent' => $faker->name,
        'prefectureAgent' => $faker->name,
        'religionAgent' => $faker->name,
        'groupeSangAgent' => $faker->name,
        'rhesusAgent' => $faker->name,
        'dateEmbauche' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'numDecision' => 1,
        'dateDecision' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'numCNSS' => 4,
        'numAllocation' => 6,
        'langue' => $faker->languageCode,
        'loisir' => $faker->name,
        'dateRetraite' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'dateBapteme' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'pasteurBapteme' => $faker->name,
        'dateConfirmation' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'lieuConfirmation' => $faker->name,
        'pasteurConfirm' => $faker->name,
        'nomParain' => $faker->name,
        'nomMarraine' => $faker->name,
        'quartier' =>$faker->city,
        'rue' =>$faker->city,
        'ville' =>$faker->city,
        'tel' =>$faker->phoneNumber,
        'email' => $faker->safeEmail,     
    ];
});

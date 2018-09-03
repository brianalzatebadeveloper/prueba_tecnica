<?php
use App\Contact;
use Faker\Generator;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Contact::class, function (Generator $faker) {
   
   $array = [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->tollFreePhoneNumber,
        'city' => $faker->city,
        'message' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'section' => 'Home'


    ];

    return $array;
});

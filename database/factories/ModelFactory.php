<?php

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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\InvItem::class, function (Faker\Generator $faker) {
    $invtype_ids = DB::table('inv_types')->select('id')->get()->all();
    return [
        'type_id'       => $faker->randomElement($invtype_ids)->id,
        'reference'     => str_random(10),
        'updated_by'    => 1,
    ];
});

$factory->define(App\InvType::class, function (Faker\Generator $faker) {
    if($faker->boolean($chanceOfGettingTrue = 40))
        $rand_mass = $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100);
    else
        $rand_mass = NULL;
    return [
        'name'          => $faker->word,
        'description'   => $faker->realText($maxNbChars = 200),
        'mass'          => $rand_mass,
    ];
});

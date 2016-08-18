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
        'first_name' => $faker->firstName,
        'surname' => $faker->lastName,
        'tel' => '+23480494983',
        'email' => $faker->safeEmail,
        'password' => bcrypt('oluseye123'),
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Truck::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function () {
            $user = factory(App\User::class)->create();
            $user->roles()->sync([\App\Role::firstOrCreate(['name' => 'driver'])::nameToId('driver')]);
            return $user->id;
        },
        'current_driver_id' => 1,
        'manufacture_date' => $faker->randomNumber(4),
        'model' => str_random(6),
        'maker' => str_random(6),
        'tons' => $faker->randomNumber(2),
        'plate' => str_random(6),
        'plate_state' => str_random(10),
        'password' => 'hello'
    ];
});

$factory->define(App\TruckData::class, function (Faker\Generator $faker) {
    return [
        'truck_id' =>  factory(App\Truck::class)->create()->id,
        'speed' => $faker->randomNumber(2),
        'lat' => $faker->randomFloat(3,6, 13),
        'lng' => $faker->randomFloat(3,3, 12),
        'active' => 0
    ];
});

<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Customer::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->safeEmail,
        'address' => $faker->address,
        'city' => $faker->city,
        'postal_code' => $faker->postcode,
        'phone' => $faker->phoneNumber,
        'company_name' => $faker->company,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
});

$factory->define(\App\Distributor::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->safeEmail,
        'address' => $faker->address,
        'city' => $faker->city,
        'postal_code' => $faker->postcode,
        'phone' => $faker->phoneNumber,
        'company_name' => $faker->company,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
});

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'product_category_id' => 1,
        'unit_id' => 8,
        'name' => $faker->word,
        'buy_price' => '1000',
        'sell_price' => '2000',
        'stock' => '10',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
});
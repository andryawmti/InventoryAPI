<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'user_group_id' => 1,
            'name' => 'Hari Setiawan',
            'email' => 'hari@hari.kudubisa.com',
            'password' => Hash::make('password'),
            'api_token' => str_random(60)
        ]);
    }
}

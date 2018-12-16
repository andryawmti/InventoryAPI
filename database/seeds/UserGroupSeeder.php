<?php

use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userGroup = \App\UserGroup::create([
            'name' => 'Administrator'
        ]);

        $userGroup = \App\UserGroup::create([
            'name' => 'User'
        ]);
    }
}

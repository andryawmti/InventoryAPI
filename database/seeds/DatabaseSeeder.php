<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserGroupSeeder::class,
            UserSeeder::class,
            UnitSeeder::class,
            CustomerSeeder::class,
            DistributorSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
            TransactionCategorySeeder::class
        ]);
    }
}
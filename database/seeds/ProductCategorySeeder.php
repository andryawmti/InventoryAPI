<?php

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\ProductCategory::create([
            'name' => 'Jersey',
            'description' => 'Just another Jersey',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}

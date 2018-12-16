<?php

use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit_list = [
            'Biji',
            'Bungkus',
            'Kantong',
            'Kotak',
            'Lusin',
            'Pack',
            'Pcs',
            'Unit'
        ];

        foreach ($unit_list as $unit) {
            \App\Unit::create([
                'name' => $unit,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}

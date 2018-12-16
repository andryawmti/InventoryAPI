<?php

use Illuminate\Database\Seeder;

class TransactionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            'Pejualan',
            'Pembelian'
        ];

        foreach ($category as $c) {
            \App\TransactionCategory::create([
                'name' => $c,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}

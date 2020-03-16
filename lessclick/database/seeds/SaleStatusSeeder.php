<?php

use Illuminate\Database\Seeder;

class SaleStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sale_statuses')->insert(
            [
                'id' => 1,
                'name' => 'Aberta'
            ]
        );

        DB::table('sale_statuses')->insert(
            [
                'id' => 2,
                'name' => 'Cancelada'
            ]
        );

        DB::table('sale_statuses')->insert(
            [
                'id' => 3,
                'name' => 'Confirmada'
            ]
        );
    }
}

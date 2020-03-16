<?php

use Illuminate\Database\Seeder;

class EventStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_statuses')->insert(
            [
                'id' => 1,
                'name' => 'Ativo'
            ]
        );
        DB::table('event_statuses')->insert(
            [
                'id' => 2,
                'name' => 'Em Andamento'
            ]
        );
        DB::table('event_statuses')->insert(
            [
                'id' => 3,
                'name' => 'Finalizado'
            ]
        );
        DB::table('event_statuses')->insert(
            [
                'id' => 4,
                'name' => 'Cancelado'
            ]
        );
    }
}

<?php

use Illuminate\Database\Seeder;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_statuses')->insert(
            [
                'id' => 1,
                'name' => 'Disponível'
            ]
        );

        DB::table('ticket_statuses')->insert(
            [
                'id' => 2,
                'name' => 'Bloqueado'
            ]
        );
    }
}

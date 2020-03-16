<?php

use Illuminate\Database\Seeder;

class TicketProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_profiles')->insert(
            [
                'id' => 1,
                'name' => 'Inteira',
                'price' => 30.0
            ]
        );
        DB::table('ticket_profiles')->insert(
            [
                'id' => 2,
                'name' => 'Meia',
                'price' => 15.0
            ]
        );
        DB::table('ticket_profiles')->insert(
            [
                'id' => 3,
                'name' => 'PCD',
                'price' => 20.0
            ]
        );
        DB::table('ticket_profiles')->insert(
            [
                'id' => 4,
                'name' => 'Sócio',
                'price' => 10.0
            ]
        );
    }
}

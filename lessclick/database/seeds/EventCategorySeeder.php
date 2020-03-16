<?php

use Illuminate\Database\Seeder;

class EventCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_categories')->insert(
            [
                'id' => 1,
                'name' => 'Show'
            ]
        );
        DB::table('event_categories')->insert(
            [
                'id' => 2,
                'name' => 'Jogo de Futebol'
            ]
        );
        DB::table('event_categories')->insert(
            [
                'id' => 3,
                'name' => 'Tour'
            ]
        );
    }
}

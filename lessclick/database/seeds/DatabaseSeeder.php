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
        // $this->call(UsersTableSeeder::class);
        $this->call(EventStatusSeeder::class);
        $this->call(EventCategorySeeder::class);
        $this->call(SaleStatusSeeder::class);
        $this->call(TicketStatusSeeder::class);
        $this->call(TicketProfileSeeder::class);

    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmptyDbSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(TestTicketsSeeder::class);
        $this->call(TicketStatesSeeder::class);
    }
}

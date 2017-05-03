<?php

use Illuminate\Database\Seeder;

class EmptyDbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Empty DB
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('ticket_states')->truncate();
        DB::table('ticket_comments')->truncate();
        DB::table('tickets')->truncate();
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

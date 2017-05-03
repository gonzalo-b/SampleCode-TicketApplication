<?php

use Illuminate\Database\Seeder;

class TicketStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {         
        // States
        DB::table('ticket_states')->insert([
            'title' => 'New',
            'locked' => true,
            'slug' => 'new'
        ]);
        DB::table('ticket_states')->insert([
            'title' => 'Investigating',
            'locked' => true,
            'slug' => 'investigating'
        ]);
        DB::table('ticket_states')->insert([
            'title' => 'Waiting For Response',
            'locked' => true,
            'slug' => 'waiting-for-response'
        ]);
        DB::table('ticket_states')->insert([
            'title' => 'Escalate',
            'locked' => true,
            'slug' => 'escalated'
        ]);
        DB::table('ticket_states')->insert([
            'title' => 'Closed',
            'locked' => true,
            'slug' => 'closed'
        ]);
    }
}

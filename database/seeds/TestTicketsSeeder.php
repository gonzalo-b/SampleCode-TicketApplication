c<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TestTicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        factory(App\Ticket::class,5)->create([
            'subject' => $faker->sentence(5),
            'summary' => $faker->paragraph(2),
            'user_id' => 1,
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Initiate Faker
        $faker = Faker::create();

        // Empty DB
        DB::table('users')->truncate();

        // Admin User
        DB::table('users')->insert([
            'first_name' => $faker->firstNameMale(),
            'last_name' => $faker->lastName(),
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin@mail.com')
        ]);
        // Normal User
        DB::table('users')->insert([
            'first_name' => $faker->firstNameFemale(),
            'last_name' => $faker->lastName(),
            'email' => 'user@user.com',
            'password' => bcrypt('user@user.com')
        ]);
    }
}

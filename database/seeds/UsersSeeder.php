<?php

use Carbon\Carbon;
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
        $amount = 70;
        if (Schema::hasTable('users') == false) {
            $this->command->warn("Seeding users failed; table 'users' doesn't exist in database...");
            return;
        }

        $faker = Faker::create('nl_NL');
        DB::table('users')->insert([
            'name' => 'Dev',
            'about' => $faker->paragraph,
            'gender' => 'M',
            'birthdate' => $faker->dateTimeBetween('-20 years', '-19 years'),
            'place' => $faker->city,
            'email' => 'dev@dev.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role_id' => 1,
            'last_login' => Carbon::now(),
            'remember_token' => str_random(10),
        ]);
        $this->command->info("Seeded user dev (dev@dev.com) with password 'password'");


        factory(App\User::class, $amount)->create();
        $this->command->info('Seeded ' . $amount . ' users');
    }
}

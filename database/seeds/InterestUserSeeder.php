<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use \App\Interest;

class InterestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('interest_user') == false) {
            $this->command->warn("Seeding interest_user failed; table 'interest_user' doesn't exist in database...");
            return;
        }

        $faker = Faker::create('nl_NL');
        $users = User::all();
        $interests = Interest::all();

        foreach ($users as $user) {
            $amountOfInterests = $faker->numberBetween(1, 3);
            foreach (range(1, $amountOfInterests) as $index) {
                DB::table('interest_user')->insert([
                    'user_id' => $user->id,
                    'interest_id' => $interests->random()->id,
            ]);
            }
        }
    }
}

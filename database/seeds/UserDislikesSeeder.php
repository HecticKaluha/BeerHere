<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserDisLikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('dislikes') == false) {
            $this->command->warn("Seeding dislikes failed; table 'dislikes' doesn't exist in database...");
            return;
        }

        $faker = Faker::create('nl_NL');
        $users = User::all()->shuffle();


        foreach ($users as $user) {
            $uniqueUsers = $users->shuffle();
            $amountOfDislikes = $faker->numberBetween(1, 17);
            foreach (range(1, $amountOfDislikes) as $index) {
                $userToDislike = $uniqueUsers->pop();
                DB::table('dislikes')->insert([
                    'user_id' => $user->id,
                    'dislikes_user_id' => $userToDislike->id,
                    'disliked_on' => $faker->dateTimeBetween(Carbon::now()->subWeeks(3), ' now'),
                ]);
            }
        }
    }
}

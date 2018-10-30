<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserLikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('likes') == false) {
            $this->command->warn("Seeding likes failed; table 'likes' doesn't exist in database...");
            return;
        }

        $faker = Faker::create('nl_NL');
        $users = User::all()->shuffle();

        foreach ($users as $user) {
            $uniqueUsers = $users->shuffle();
            $amountOfLikes = $faker->numberBetween(1, 17);
            foreach (range(1, $amountOfLikes) as $index) {
                DB::table('likes')->insert([
                    'user_id' => $user->id,
                    'likes_user_id' => $uniqueUsers->pop()->id,
                    'liked_on' => $faker->dateTimeBetween(Carbon::now()->subWeeks(3), ' now'),
                ]);
            }
        }
    }
}

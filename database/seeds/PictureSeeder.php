<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('users') == false) {
            $this->command->warn("Seeding users failed; table 'users' doesn't exist in database...");
            return;
        }
        $faker = Faker::create('nl_NL');
        foreach (User::all() as $user) {
            foreach (range(0, 10) as $picture) {
                DB::table('pictures')->insert([
                    'picture_url' => 'uploads/pictures/defaults/photo' . $faker->randomElement(range(1,39)) . '.jpg',
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}

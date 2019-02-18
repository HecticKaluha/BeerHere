<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class InterestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('interests') == false) {
            $this->command->warn("Seeding interests failed; table 'interests' doesn't exist in database...");
            return;
        }

        $interests = ['Beer', 'Wine', 'Whiskey', 'Non-alcoholic', 'Liqueur'];
        $pictureUrls = ['/uploads/interest_pictures/beer.jpg', '/uploads/interest_pictures/wine.jpeg', '/uploads/interest_pictures/whiskey.jpeg', '/uploads/interest_pictures/non_alcoholic.jpeg', '/uploads/interest_pictures/liqueur.jpeg'];
        foreach($interests as $key => $interest)
        {
            DB::table('interests')->insert([
                'name' => $interest,
                'picture_url' => $pictureUrls[$key],
                'created_at' => Carbon::now(),
            ]);
            $this->command->info("Seeded Interest " . $interest);
        }

    }
}

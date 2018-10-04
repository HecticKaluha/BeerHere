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

        $interests = ['Beer', 'Wine', 'Whiskey', 'Non-alcoholic', 'Liquor'];
        foreach($interests as $interest)
        {
            DB::table('interests')->insert([
                'name' => $interest,
                'created_at' => Carbon::now(),
            ]);
            $this->command->info("Seeded Interest " . $interest);
        }

    }
}

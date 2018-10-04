<?php

use Illuminate\Database\Seeder;

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

        factory(App\User::class, $amount)->create();
        $this->command->info('Seeded ' . $amount . ' users');
    }
}

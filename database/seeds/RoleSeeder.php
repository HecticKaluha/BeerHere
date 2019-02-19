<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('roles') == false) {
            $this->command->warn("Seeding roles failed; table 'roles' doesn't exist in database...");
            return;
        }

        $roles = ['Admin', 'Dev', 'User'];
        foreach($roles as $role){
            DB::table('roles')->insert([
                'name' => $role,
            ]);
            $this->command->info("Seeded role " . $role);
        }
    }
}

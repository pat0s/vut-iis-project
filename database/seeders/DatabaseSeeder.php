<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Role::factory(3)->create();
        Role::create(['role_name' => 'super admin']);
        Role::create(['role_name' => 'admin']);
        Role::create(['role_name' => 'user']);

        \App\Models\Person::factory(5)->create();

        \App\Models\Sport::factory(5)->create();
    }
}

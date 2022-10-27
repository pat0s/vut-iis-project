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

        \App\Models\Role::factory(3)->create();

        \App\Models\Person::factory(50)->create();

        \App\Models\Sport::factory(5)->create();

        \App\Models\Tournament::factory(2)->create();

        \App\Models\Team::factory(5)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Person;
use App\Models\Sport;
use App\Models\Tournament;
use App\Models\Team;
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

        Role::factory(3)->create();

        Person::factory(50)->create();
        Person::create(array(
            'first_name' => 'admin',
            'surname' => 'super',
            'email' => 'super@admin',
            'username' => 'admin',
            'password' => '$2y$10$lV6gl3I9bu6cgRsFI.QlTOBg5SvDUtk9Y2L5k/g.RNwV0zaXSwS6e',
            'role_id' => 3,
        ));

        Sport::factory(5)->create();

        Tournament::factory(2)->create();

        Team::factory(5)->create();


    }
}

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
        Role::create(['role_name' => 'user']);  // ID=1
        Role::create(['role_name' => 'admin']);  // ID=2
        Role::create(['role_name' => 'super admin']);  // ID=3

        Person::factory(500)->create();
        Person::create(array(
            'first_name' => 'admin',
            'surname' => 'super',
            'email' => 'super@admin',
            'username' => 'admin',
            'password' => '$2y$10$lV6gl3I9bu6cgRsFI.QlTOBg5SvDUtk9Y2L5k/g.RNwV0zaXSwS6e',
            'role_id' => 3,
        ));

        Sport::factory(15)->create();

        Tournament::factory(25)->create();

        Team::factory(50)->create()->each( function($team) {
            $noMembersWithoutManager = $team->number_of_players-1;
            $manager = Person::find($team->manager_id);
            $members = Person::where('person_id', '!=', $team->manager_id)->skip(rand(1,480))->take($noMembersWithoutManager)->get();
            $members->push($manager);
            $team->members()->attach($members);
        });
    }
}

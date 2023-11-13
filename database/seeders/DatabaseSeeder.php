<?php

namespace Database\Seeders;

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
        $projectRace = \App\Models\Project::create([
            'title' => 'Race Bike',
            'description' => '2021 Specialized Enduro'
        ]);


        $projectCruiser = \App\Models\Project::create([
            'title' => 'Beach Cruiser',
            'description' => 'Schwinn Taff'
        ]);


        \App\Models\Task::create([
            'title' => 'Level out grips',
            'description' => 'Grips are setup askew',
            'priority' => 3,
            'created_at' => rand(time()-rand(0, 1000000), time()-100),
            'project_id' => $projectCruiser->id,
            'status' => 1,
            'sortOrder' => 1
        ]);
        \App\Models\Task::create([
            'title' => 'Need new rear tire',
            'description' => 'Customer requested a new DHR',
            'priority' => 1,
            'created_at' => rand(time()-rand(0, 1000000), time()-100),
            'project_id' => $projectRace->id,
            'status' => 0,
            'sortOrder' => 2
        ]);
        \App\Models\Task::create([
            'title' => 'Straighten stem and replace bent bars',
            'description' => 'Customer wanted a new set of Deity bars',
            'priority' => 0,
            'created_at' => rand(time()-rand(0, 1000000), time()-100),
            'project_id' => $projectCruiser->id,
            'status' => 2,
            'sortOrder' => 3
        ]);
        \App\Models\Task::create([
            'title' => 'New cable and housing ',
            'description' => 'Derailleur possibly bent?',
            'priority' => 2,
            'created_at' => rand(time()-rand(0, 1000000), time()-100),
            'project_id' => $projectCruiser->id,
            'status' => 3,
            'sortOrder' => 4
        ]);
        \App\Models\Task::create([
            'title' => 'Brake bleed and fresh pads',
            'description' => 'Waiting on order of fresh TRP metallics',
            'priority' => 1,
            'created_at' => rand(time()-rand(0, 1000000), time()-100),
            'project_id' => $projectRace->id,
            'status' => 1,
            'sortOrder' => 5
        ]);
        \App\Models\Task::create([
            'title' => 'Retension spokes',
            'description' => 'Need to pull dent from rim if possible',
            'priority' => 4,
            'created_at' => rand(time()-rand(0, 1000000), time()-100),
            'project_id' => $projectRace->id,
            'status' => 0,
            'sortOrder' => 6
        ]);
        \App\Models\Task::create([
            'title' => 'Rear damper bleed',
            'description' => 'New seals and oil for rear shock',
            'priority' => 1,
            'created_at' => rand(time()-rand(0, 1000000), time()-100),
            'project_id' => $projectRace->id,
            'status' => 1,
            'sortOrder' => 7
        ]);
        \App\Models\Task::create([
            'title' => 'Rusty Chain',
            'description' => '',
            'priority' => 1,
            'created_at' => rand(time()-rand(0, 1000000), time()-100),
            'project_id' => $projectCruiser->id,
            'status' => 1,
            'sortOrder' => 8
        ]);
        \App\Models\Task::create([
            'title' => 'Loose Cassette',
            'description' => 'Cassette needs to be tightened to driver body. May need new wheel bearings.',
            'priority' => 3,
            'created_at' => rand(time()-rand(0, 1000000), time()-100),
            'project_id' => $projectCruiser->id,
            'status' => 1,
            'sortOrder' => 9
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Type;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Social;
use App\Models\Educational;
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

        User::truncate();
        Type::truncate();
        Project::truncate();
        Skill::truncate();
        Social::truncate();
        Educational::truncate();
        
        User::factory()->count(2)->create();
        Type::factory()->count(3)->create();
        Project::factory()->count(4)->create();
        Skill::factory()->count(4)->create();
        Social::factory()->count(4)->create();
        Educational::factory()->count(4)->create();

            
    }
}

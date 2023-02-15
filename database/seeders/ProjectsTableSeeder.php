<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use App\Models\Level;
use App\Models\Project;
use App\Models\Tecnology;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tecnologies=Tecnology::all();

        for ($i = 0; $i < 12; $i++) {

            $newProject = new Project();

            $newProject->title = 'project_' . $i;
            $newProject->description = $faker->realText();

            $newProject->github_link = "https://github.com/KellerMarika";
            $newProject->cover_img = '/projects/' . $i . '.png';
            $newProject->completed = $faker->numberBetween(0, 1);
            $newProject->type_id = $faker->numberBetween(1, 3);
            $newProject->level_id = $faker->numberBetween(1, 3);
           // $newProject->tecnologies()->attach($faker->numberBetween(1, 3));
            $newProject->save();
        }
    }
}
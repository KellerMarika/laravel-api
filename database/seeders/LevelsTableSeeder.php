<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels_list = [

            [
                'name' => 'easy',
            ],
            [
                'name' => 'medium',
            ],
            [
                'name' => 'hard',
            ],
        ];


        foreach ($levels_list as $level) {

            $newLevel = new Level();
            $newLevel->fill($level);
            $newLevel->save();
        }
    }
}
<?php

namespace Database\Seeders;

use App\Models\Tecnology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TecnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tecnologies = [
            'html',
            'css',
            'sass',
            'javascript',
            'Vue JS',
            'MySQL',
            'php',
            'laravel'
        ];

        foreach ($tecnologies as $tecnology) {
            tecnology::create([
                'name'=> $tecnology
            ]);
        }
    }
}

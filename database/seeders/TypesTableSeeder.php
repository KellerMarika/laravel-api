<?php

namespace Database\Seeders;


use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Types_list = [

            [
                'name' => 'front-end',
            ],
            [
                'name' => 'back-end',
            ],
            [
                'name' => 'full stack',
            ],
        ];

        foreach ($Types_list as $type) {
            $newType = new Type();
            $newType->fill($type);
            $newType->save();
        }
    }
}
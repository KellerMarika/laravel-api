<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $users = [

            [
                'name' => 'Marika',
                'surname' => 'Keller',
                'birth_date' => '02-11-1992',
                'email' => "marikaKeller92@gmail.com",
                'password' => '123stella',
            ],
        ];

        foreach ($users as $user) {
            $newUser = new User();
            $newUser->fill($user);
    /*         $newUser->birth_date = strtotime("2022-06-06"), "\n" */
            $newUser->password = Hash::make($user['password']);
            $newUser->birth_date = Hash::make($user['birth_date']);
            $newUser->birth_date = Carbon::createFromDate($user['birth_date'])->toDateTimeString();

            $newUser->is_superadmin = 1;

            $newUser->save();
        }
    }


}

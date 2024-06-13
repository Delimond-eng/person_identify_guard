<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
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
                'name' => 'Gaston Delimond',
                'email' => 'gastondelimond@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Lionnel Nawej',
                'email' => 'lionnelnawej@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
            ]
        ];
        DB::table('users')->insert($users);
    }
}
<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('123456');

        $users = [
            [
                'name' => 'Juan',
                'email' => 'juan@gmail.com',
                'password' => $password,
            ],
            [
                'name' => 'Emilia',
                'email' => 'emilia@gmail.com',
                'password' => $password,
            ],
            [
                'name' => 'Geraldin',
                'email' => 'geraldin@gmail.com',
                'password' => $password,
            ],
            [
                'name' => 'Brandon Carvajal',
                'email' => 'brandonscs@gmail.com',
                'password' => $password,
            ],
        ];

        DB::table('users')->insert($users);
    }
}
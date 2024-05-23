<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Role 0 = Admin
        // Role 1 = Pegawai
        $posts = [
            [
                'name' => 'Admin',
                'email' => 'Admin@gmail.com',
                'role' => '0',
                'password' => Hash::make('admin123'),
            ],
            [
                'name' => 'Danu',
                'email' => 'danu@gmail.com',
                'role' => '1',
                'password' => Hash::make('danu123'),
            ],
        ];

        DB::table('users')->insert($posts);
    }
}

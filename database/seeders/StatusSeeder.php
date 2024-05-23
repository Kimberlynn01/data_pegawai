<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            ['nama_status' => 'Aktif'],
            ['nama_status' => 'Tidak Aktif'],
            ['nama_status' => 'Pensiun'],
        ];

        DB::table('status')->insert($posts);
    }
}

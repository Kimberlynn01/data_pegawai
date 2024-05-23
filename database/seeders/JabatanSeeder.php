<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'nama_jabatan' => 'Manager',
            ],
            [
                'nama_jabatan' => 'Supervisor',
            ],
            [
                'nama_jabatan' => 'Karyawan',
            ],
            [
                'nama_jabatan' => 'Staff',
            ],
            [
                'nama_jabatan' => 'Manajer',
            ],
        ];

        DB::table('jabatan_pegawai')->insert($posts);
    }
}

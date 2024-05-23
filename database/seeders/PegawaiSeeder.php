<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'nama' => 'John Doe',
                'nomorhp' => '08123456789',
                'alamat' => 'Jl. Contoh No. 123',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '1990-05-15',
                'jabatanId' => 1,
                'gaji' => '10000000',
                'statusId' => 1,
                'userId' => 1,
            ],
            [
                'nama' => 'Jane Doe',
                'nomorhp' => '087654321',
                'alamat' => 'Jl. Dummy No. 456',
                'jenis_kelamin' => 'Perempuan',
                'tanggal_lahir' => '1995-10-20',
                'jabatanId' => 3,
                'gaji' => '8000000',
                'userId' => 1,
                'statusId' => 1,
            ],
            [
                'nama' => 'Michael Smith',
                'nomorhp' => '0812345678',
                'alamat' => 'Jl. Test No. 789',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '1985-07-10',
                'jabatanId' => 2,
                'gaji' => '12000000',
                'statusId' => 2,
                'userId' => 1,
            ],
            [
                'nama' => 'Maria Garcia',
                'nomorhp' => '0854321765',
                'alamat' => 'Jl. Example No. 321',
                'jenis_kelamin' => 'Perempuan',
                'tanggal_lahir' => '1993-03-25',
                'jabatanId' => 3,
                'gaji' => '7000000',
                'statusId' => 2,
                'userId' => 1,
            ],
            [
                'nama' => 'David Johnson',
                'nomorhp' => '0876543210',
                'alamat' => 'Jl. Dummy No. 555',
                'jenis_kelamin' => 'Laki-laki',
                'tanggal_lahir' => '1988-12-05',
                'jabatanId' => 2,
                'gaji' => '15000000',
                'statusId' => 1,
                'userId' => 1,
            ],
        ];

        DB::table('data_pegawai')->insert($posts);
    }
}

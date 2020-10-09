<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'nama' => 'Licco Anwar',
            'universitas' => 'Universitas Surabaya',
            'fakultas' => 'Ilmu Psikologi',
            'prodi' => 'Psikologi',
            'jurusan' => 'Psikologi',
            'angkatan' => '2014',
            'alamat' => 'Rungkut indah',
            'telp' => '08123456789',
        ]);

        Student::create([
            'nama' => 'Gabby Allodia',
            'universitas' => 'Universitas PN',
            'fakultas' => 'Ilmu Komunikasi',
            'prodi' => 'Ilmu Komunikasi',
            'jurusan' => 'Ilmu Komunikasi',
            'angkatan' => '2014',
            'alamat' => 'Pasar Besar',
            'telp' => '08123456788',
        ]);
    }
}

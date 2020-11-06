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
            'user_id' => '1',
            'nisn' => '1714321006',
            'nama' => 'Yuga Kurniawan',
            'jenis_kelamin' => 'Laki-Laki',
            'agama' => 'Islam',
            'email' => 'yugakurniawan@yahoo.com',
            'tempat_lahir' => 'Medan',
            'tgl_lahir' => '1995-05-02',
            'alamat' => 'Rungkut indah',
            'telp' => '08123456789',
        ]);

        Student::create([
            'user_id' => '2',
            'nisn' => '1714321009',
            'nama' => 'Indra Oktavian',
            'jenis_kelamin' => 'Laki-Laki',
            'agama' => 'Islam',
            'email' => 'indraoktavian@gmail.com',
            'tempat_lahir' => 'Lamongan',
            'tgl_lahir' => '1995-05-02',
            'alamat' => 'Pasar Besar',
            'telp' => '08123456788',
        ]);

        Student::create([
            'user_id' => '3',
            'nisn' => '1714321010',
            'nama' => 'Yohanes Antonius',
            'jenis_kelamin' => 'Laki-Laki',
            'agama' => 'Kristen',
            'email' => 'yohanesantonius@yahoo.com',
            'tempat_lahir' => 'Sidoarjo',
            'tgl_lahir' => '1995-03-11',
            'alamat' => 'Buduran Sidoarjo',
            'telp' => '08123455866',
        ]);
    }
}

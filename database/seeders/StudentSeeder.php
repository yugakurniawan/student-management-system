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
            'tempat_lahir' => 'Jember',
            'tgl_lahir' => '1997-07-10',
            'agama' => 'Islam',
            'alamat' => 'Ketapang Suko VA 8',
            'email' => 'yugakurniawan@yahoo.com',
            'telp' => '089506585454',
            'ayah' => 'Soetrisno',
            'pekerjaan_ayah' => 'PJKA',
            'ibu' => 'Sulikah',
            'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            'status_ortu' => 'Yatim'
        ]);

        Student::create([
            'user_id' => '2',
            'nisn' => '1714321009',
            'nama' => 'Indra Oktavian',
            'jenis_kelamin' => 'Laki-Laki',
            'tempat_lahir' => 'Sidoarjo',
            'tgl_lahir' => '1997-10-01',
            'agama' => 'Islam',
            'alamat' => 'Sepanjang',
            'email' => 'indraoktavian1997@gmail.com',
            'telp' => '081111222333',
            'ayah' => 'kasilas',
            'pekerjaan_ayah' => 'PLN',
            'ibu' => 'Sumaryam',
            'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            'status_ortu' => 'Lengkap'
        ]);

        Student::create([
            'user_id' => '3',
            'nisn' => '1714321010',
            'nama' => 'Yohanes',
            'jenis_kelamin' => 'Laki-Laki',
            'tempat_lahir' => 'Sidoarjo',
            'tgl_lahir' => '1995-04-07',
            'agama' => 'Islam',
            'alamat' => 'Bandara',
            'email' => 'yohanantonius22@gmail.com',
            'telp' => '082222333444',
            'ayah' => 'Margono',
            'pekerjaan_ayah' => 'Pilot',
            'ibu' => 'Sukijan',
            'pekerjaan_ibu' => 'Penjual',
            'status_ortu' => 'Lengkap'
        ]);

    }
}

<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::create([
            'nama' => 'Wahyuni SN',
            'telp' => '08888777666',
            'alamat' => 'Surabaya'
        ]);

        Teacher::create([
            'nama' => 'Fardanto ST MT',
            'telp' => '08888777111',
            'alamat' => 'Surabaya'
        ]);
    }
}

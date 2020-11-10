<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
            'kode' => 'MD001',
            'nama' => 'Matematika Dasar',
            'semester' => 'Ganjil'
        ]);
        Subject::create([
            'kode' => 'BI001',
            'nama' => 'Bahasa Indonesia',
            'semester' => 'Ganjil'
        ]);
    }
}

<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::all();
    }

    public function map($student): array
    {
        return [
            $student->nisn,
            $student->nama,
            $student->jenis_kelamin,
            $student->tempat_lahir,
            $student->tgl_lahir,
            $student->agama,
            $student->alamat,
            $student->email,
            $student->telp,
            $student->ayah,
            $student->pekerjaan_ayah,
            $student->ibu,
            $student->pekerjaan_ibu,
            $student->status_ortu
        ];
    }

    public function headings(): array
    {
        return [
            'NISN',
            'NAMA',
            'JENIS KELAMIN',
            'TEMPAT LAHIR',
            'TGL LAHIR',
            'AGAMA',
            'ALAMAT',
            'EMAIL',
            'TELP',
            'AYAH',
            'PEKERJAAN_AYAH',
            'IBU',
            'PEKERJAAN_IBU',
            'STATUS ORANG TUA'
        ];
    }

}

<?php

use App\Models\Student;
use App\Models\Teacher;

function ranking5Besar()
{
    $students = Student::all();
    $students->map(function($s){
        $s->average = $s->average();
        return $s;
    });
    $students = $students->sortByDesc('average')->take(5);
    return $students;
}

function totalSiswa()
{
    return Student::count();
}

function totalGuru()
{
    return Teacher::count();
}

function tgl($tanggal)
    {
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

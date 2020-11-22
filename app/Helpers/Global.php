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

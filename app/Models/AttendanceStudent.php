<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceStudent extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "attendance_student";
    use HasFactory;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }

    public function presence()
    {
        return $this->hasMany(Presence::class);
    }
}

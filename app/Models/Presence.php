<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function attendance_student()
    {
        return $this->belongsTo(AttendanceStudent::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}

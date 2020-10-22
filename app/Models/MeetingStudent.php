<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingStudent extends Model
{
    protected $guarded = [];
    protected $table = "meeting_student";
    use HasFactory;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }

    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class);
    }
}

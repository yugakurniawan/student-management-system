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
}
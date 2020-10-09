<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function meeting_student()
    {
        return $this->belongsTo(MeetingStudent::class);
    }
}

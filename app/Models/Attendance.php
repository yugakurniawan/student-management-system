<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function student()
    {
        return $this->belongsToMany(Student::class)->withPivot(['nilai']);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}

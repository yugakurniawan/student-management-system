<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $guarded = [];
    use HasFactory;

    public function scores()
    {
        return $this->hasMany(Score::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}

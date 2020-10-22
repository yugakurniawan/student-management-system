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

    public function getAvatar()
    {
        if(!$this->avatar){
            return asset('assets/img/user-medium.png');
        }

        return asset('images/'.$this->avatar);
    }

    public function meetings()
    {
        return $this->belongsToMany(Meeting::class);

    }

    public function meeting_student()
    {
        return $this->hasMany(MeetingStudent::class);
    }

}

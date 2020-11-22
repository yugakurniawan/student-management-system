<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $guarded = [];
    use HasFactory;

    public function subject()
    {
        return $this->belongsToMany(Subject::class)->withPivot(['nilai'])->withTimestamps();

    }

    public function getAvatar()
    {
        if(!$this->avatar){
            return asset('assets/img/user-medium.png');
        }

        return asset('images/'.$this->avatar);
    }

    public function average()
    {
        $total = 0;
        $jumlah = 0;
        foreach ($this->subject as $subject) {
            $total += $subject->pivot->nilai;
            $jumlah++;
        }

        return $jumlah == 0 ? 0 : round($total/$jumlah);
    }

}

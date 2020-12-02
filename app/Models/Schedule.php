<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }

    public function presence()
    {
        return $this->hasMany(Presence::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'teacher_id',
        'deadline',
        'name',
    ];
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function student()
    {
        return $this->hasMany(Student::class);
    }
    public function degrees()
    {
        return $this->hasMany(Degree::class);
    }
}

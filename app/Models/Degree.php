<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $fillable = [
        'degree',
        'student_id',
        'assignment_id',
    ];
    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function assignment(){
        return $this->belongsTo(assignment::class);
    }
}

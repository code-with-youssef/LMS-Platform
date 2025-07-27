<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // بدل Model
use Illuminate\Database\Eloquent\Model;

class Teacher extends Authenticatable
{
    protected $fillable = [
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    public function assignments() {
         return $this->hasMany(Assignment::class);
    }
}

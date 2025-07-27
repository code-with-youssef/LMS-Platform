<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    protected $fillable = [
        'user_id'
    ];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
     public function degree()
    {
        return $this->hasMany(Degree::class);
    }
}

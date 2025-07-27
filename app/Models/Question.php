<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable =[
        'assignment_id',
        'question',
        'answer',
    ];

    public function choices(){
        return $this->hasMany(Choice::class);
    }
}

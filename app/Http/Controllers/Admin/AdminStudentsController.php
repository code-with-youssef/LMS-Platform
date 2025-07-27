<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Student;
use App\Models\Teacher;

use Illuminate\Http\Request;

class AdminStudentsController extends Controller
{
    public function studentsIndex(){
        $students = Student::all();
        return view('admin.studentsIndex',compact('students'));
    }

     public function teachersIndex(){
        $teachers = Teacher::all();
        return view('admin.teachersIndex',compact('teachers'));
    }
}

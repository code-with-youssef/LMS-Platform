<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller;

use App\Models\Teacher;
use App\Models\Assignment;
use App\Models\Degree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherStudentsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $teacher = $user->teacher;
        $students = $teacher->students;
        return view('Teacher.students', compact('students'));
    }
    public function degreesShow()
    {
        $user = Auth::user();
        $teacher = $user->teacher;
        $assignmentIds = $teacher->assignments->pluck('id');
        $students = $teacher->students()->with([
            'user',
            'degree' => function ($query) use ($assignmentIds) {
                $query->whereIn('assignment_id', $assignmentIds);
            },
            'degree.assignment'
        ])->get();

        return view('Teacher.studentsDegrees', compact('students'));
    }
}

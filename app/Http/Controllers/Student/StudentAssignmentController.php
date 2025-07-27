<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;

use App\Models\Assignment;
use App\Models\Question;
use App\Models\Degree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StudentAssignmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $student = $user->student;
        $teacherIds = $student->teachers->pluck('id');
        $assignments = Assignment::whereIn('teacher_id', $teacherIds)->get();
        return view('Student.assignmentIndex', compact('assignments'));
    }



    public function assignmentSolve(Assignment $assignment)
    {
        return view('Student.assignmentSolve', compact('assignment'));
    }



    public function assignmentCorrect(Request $request, $assignmentId)
    {
        $user = Auth::user();
        $student = $user->student;
        $degree = 0;
        foreach ($request->answers as $questionId => $choice) {
            $question = Question::where('id', $questionId)->first();
            if ($choice == $question->answer) {
                $degree++;
            }
        }
        $newDegree = new Degree();
        $newDegree->degree = $degree;
        $newDegree->student_id = $student->id;
        $newDegree->assignment_id = $assignmentId;
        $newDegree->save();
        return redirect(route('student_dashboard'));
    }



    public function degreesShow()
    {
        $user = Auth::user();
        $student = $user->student;
        $degrees = Degree::where('student_id', $student->id)->get();
        return view('Student.assignmentsDegrees', compact('degrees'));
    }
}

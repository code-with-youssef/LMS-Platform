<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller;

use App\Models\Assignment;
use App\Models\Choice;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreatingAssignmentController extends Controller
{
    public function index()
    {
        return view('Teacher.assignment');
    }

    public function storeAssignment(Request $request)
    {
        $user = Auth::user();
        $assignment = new Assignment();
        $assignment->name = $request->assignment_name;
        $assignment->deadline = $request->deadline;
        $assignment->teacher_id = $user->teacher->id;
        $assignment->save();
        $this->storeQuestion($request, $assignment->id);
        return redirect()->route('teacher_dashboard')->with('message', 'Assignment created successfully!');
    }

    private function storeQuestion($request, $id)
    {
        foreach ($request->questions as $question) {
            $newQuestion = new Question();
            $newQuestion->question = $question['question'];
            $newQuestion->answer = $question['answer'];
            $newQuestion->assignment_id = $id;
            $newQuestion->save();
            $this->storeChoices($question['choices'], $newQuestion->id);
        }
    }

    private function storeChoices($choices, $questionId)
    {
        foreach ($choices as $choiceText) {
            $newChoice = new Choice();
            $newChoice->choice = $choiceText;
            $newChoice->question_id = $questionId;
            $newChoice->save();
        }
    }
}

@extends('Layouts.teacherLayout')

@section('content')
    <div class="assignment-creator">
        <h2 class="section-title">📝 Create Assignment</h2>

        <form action="{{ route('assignment.store') }}" method="POST" id="assignmentForm">
            @csrf

            <label for="assignment_name">Name</label>
            <div class="assignment-inputs">
                <input type="text" name="assignment_name" id="assignmentName" placeholder="Assignment Name" required>
            </div>

            <label for="deadline">Deadline</label>
            <div class="assignment-inputs">
                <input type="date" name="deadline" id="deadline" required>
            </div>

            <div id="questionsContainer"></div>

            <div id="buttons-area">
                <button type="button" class="add-question-button" onclick="addQuestion()">➕ Add Question</button>
                <button type="submit" id="saveBtn" class="save-assignment-button hidden">💾 Save Assignment</button>
            </div>
        </form>
    </div>

    <script>
        let questionCount = 0;

        function addQuestion() {
            questionCount++;

            const container = document.getElementById('questionsContainer');

            const questionDiv = document.createElement('div');
            questionDiv.className = 'question-block';

            questionDiv.innerHTML = `
                <h4>Question ${questionCount}</h4>
                <input type="text" name="questions[${questionCount}][question]" placeholder="Enter question" required><br><br>
                <input class="choice-input" type="text" name="questions[${questionCount}][choices][]" placeholder="Choice 1" required>
                <input class="choice-input" type="text" name="questions[${questionCount}][choices][]" placeholder="Choice 2" required>
                <input class="choice-input" type="text" name="questions[${questionCount}][choices][]" placeholder="Choice 3" required>
                <input class="choice-input" type="text" name="questions[${questionCount}][choices][]" placeholder="Choice 4" required>
                <br><br>
                <input class="choice-input" type="text" name="questions[${questionCount}][answer]" placeholder="Answer" required>
            `;

            container.appendChild(questionDiv);

            // Move buttons after the last question block
            container.parentNode.appendChild(document.getElementById('buttons-area'));

            // Show save button
            document.getElementById('saveBtn').classList.remove('hidden');
        }
    </script>
@endsection

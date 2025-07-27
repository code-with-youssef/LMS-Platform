@extends('Layouts.studentLayout')
@section('content')
    <div class="assignment-creator">
        <h2 class="section-title">📝 {{ $assignment->name }}</h2>

        <form action="{{route('assignment.correct',$assignment->id)}}" method="POST">
            @csrf

            @foreach($assignment->questions as $index => $question)
                <div class="question-block">
                    <h4>Question {{ $index + 1 }}</h4>
                    <p class="question-text">{{ $question->question }}</p>

                    <div class="choices-container">
                        @foreach($question->choices as $choice)
                            <div class="choice-option">
                                <label class="choice-label">
                                    <input type="radio"
                                           name="answers[{{ $question->id }}]"
                                           value="{{ $choice->choice }}"
                                           required
                                           class="choice-radio">
                                    <span class="choice-text">{{ $choice->choice }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <div id="buttons-area">
                <button type="submit" class="save-assignment-button">
                    ✅ Submit Answers
                </button>
            </div>
        </form>
    </div>
@endsection
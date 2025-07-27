@extends('Layouts.studentLayout')
@section('content')
    @foreach ($assignments as $assignment)
        <a href="{{ route('assignment.solve', $assignment) }}" class="dashboard-card card teacher">
            <div class="card-icon icon-green">📝</div>
            <div class="card-content">
                <div class="card-title">{{ $assignment->name }}</div>
                <div class="card-description">Created by: Mr. {{ $assignment->teacher->user->name }}</div>
                <div class="card-description"> DeadLine:
                    {{ \Carbon\Carbon::parse($assignment->deadline)->format('l, d M Y') }}</div>
            </div>
        </a>
    @endforeach
@endsection

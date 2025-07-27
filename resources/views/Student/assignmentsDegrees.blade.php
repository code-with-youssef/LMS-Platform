@extends('Layouts.teacherLayout')
@section('content')
    <div class="container">
        <div class="header">
            <h1>Student Degrees</h1>
        </div>
        <div class="table-container">
            <table class="students-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Assignment Name</th>
                        <th>Teacher Name</th>
                        <th>Degree</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($degrees as $index => $degree)
                        <tr>
                            <td>
                                <div class="student-number">{{ $index + 1}}</div>
                            </td>
                            <td class="student-name">{{ $degree->assignment->name }}</td>
                            <td class="student-name">{{ $degree->assignment->teacher->user->name ?? 'N/A' }}</td>
                            <td class="student-name">{{ $degree->degree }} /
                                {{ $degree->assignment->questions->count() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

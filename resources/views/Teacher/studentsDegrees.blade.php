@extends('Layouts.teacherLayout')
@section('content')
    <div class="container">
        <div class="header">
            <h1>Students Degrees</h1>
        </div>
        <div class="table-container">
            <table class="students-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student's Name</th>
                        <th>Assignment Name</th>
                        <th>Degree</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $index => $student)
                        @foreach ($student->degree as $degree)
                            <tr>
                                <td>
                                    <div class="student-number">{{ $index + 1 }}</div>
                                </td>
                                <td class="student-name">{{ $student->user->name }}</td>
                                <td class="student-name">{{ $degree->assignment->name ?? 'N/A' }}</td>
                                <td class="student-name">{{ $degree->degree }} /
                                    {{ $degree->assignment->questions->count() }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

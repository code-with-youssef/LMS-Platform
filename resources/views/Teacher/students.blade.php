@extends('Layouts.teacherLayout')
@section('content')
    <div class="container">
        <div class="header">
            <h1>Students Table</h1>
        </div>
        <div class="table-container">
            <table class="students-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student's Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $index => $student)
                        <tr>
                            <td>
                                <div class="student-number">{{ $index + 1 }}</div>
                            </td>
                            <td class="student-name">{{ $student->user->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

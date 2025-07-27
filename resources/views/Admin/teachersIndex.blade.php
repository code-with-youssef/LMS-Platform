@extends('Layouts.teacherLayout')
@section('content')
    <div class="container">
        <div class="header">
            <h1>Teachers Table</h1>
        </div>
        <div class="table-container">
            <table class="students-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Teacher's Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $index => $teacher)
                        <tr>
                            <td>
                                <div class="student-number">{{ $index + 1 }}</div>
                            </td>
                            <td class="student-name">{{ $teacher->user->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

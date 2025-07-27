@extends('Layouts.teacherLayout')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="cards-grid">
        <!-- Teacher Cards -->
        <a href="/my-classes" class="dashboard-card card teacher">
            <div class="card-icon icon-blue">🎓</div>
            <div class="card-content">
                <div class="card-title">My Classes</div>
                <div class="card-description">Manage your courses and students</div>
            </div>
        </a>

        <a href="{{ route('assignment.create') }}" class="dashboard-card card teacher">
            <div class="card-icon icon-green">📝</div>
            <div class="card-content">
                <div class="card-title">Create Assignment</div>
                <div class="card-description">Create and manage assignments</div>
            </div>
        </a>

        <a href="{{route('degrees.show')}}" class="dashboard-card card teacher">
            <div class="card-icon icon-purple">📊</div>
            <div class="card-content">
                <div class="card-title">Assignments Degrees</div>
                <div class="card-description">Grade submissions and track progress</div>
            </div>
        </a>

        <a href="{{ route('teacherStudents') }}" class="dashboard-card card teacher">
            <div class="card-icon icon-orange">👥</div>
            <div class="card-content">
                <div class="card-title">Students</div>
                <div class="card-description">View and manage student information</div>
            </div>
        </a>

        <a href="{{ route('teacher.logout') }}" class="dashboard-card card student">
            <div class="card-icon icon-indigo">⚙️</div>
            <div class="card-content">
                <div class="card-title">Logout</div>
                <div class="card-description">Logout your account</div>
            </div>
        </a>

    </div>
@endsection

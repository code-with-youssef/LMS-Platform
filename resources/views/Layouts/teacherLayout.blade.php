<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>LMS Dashboard</title>

</head>

<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <div class="header-content">
                <h1 class="dashboard-title">LMS Dashboard</h1>
            </div>
            <form method="GET" action="{{ url()->previous() }}">
                @csrf
                <button class="home-button" type="submit">
                    <span class="home-icon">🔙</span>
                    Back
                </button>
            </form>
            <form method="GET" action="{{ route('student_dashboard') }}">
                @csrf
                <button class="home-button" type="submit">
                    <span class="home-icon">🏠</span>
                    Home
                </button>
            </form>
        </div>
        @yield('content')
    </div>


</body>

</html>

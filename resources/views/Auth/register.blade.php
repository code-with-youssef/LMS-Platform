<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Register</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>

<body>
    <div class="login-container">
        <div class="login-header">
            <div class="logo">🎓</div>
            <h1 class="login-title">Welcome Onboard</h1>
            <p class="login-subtitle">Sign up to eager your knowledge</p>
        </div>

        <form class="login-form" method="POST" action="{{ route('signup') }}">
            @csrf
            <div class="form-group">
                <label class="form-label" for="email">Username</label>
                <input type="text" id="username" class="form-input" placeholder="Enter your name" name="username"
                    required>
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <input type="email" id="email" class="form-input" placeholder="Enter your email" name="email"
                    required>
                @error('email')
                    <div class="error-message" style="color: red;">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" class="form-input" placeholder="Enter your password"
                    name ="password" required>
                @error('password')
                    <div class="error-message" style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" class="form-input" placeholder="Confirm password"
                    name ="password_confirmation" required>
                @error('password_confirmation')
                    <div class="error-message" style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" name='role' for="role">Signup As</label>
                <select id="role" class="form-select" name='role' required>
                    <option value="">Select your role</option>
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                </select>
            </div>
            <button type="submit" class="login-button">Sign up</button>
            <div class="register-link" style="text-align: center; margin: 20px 0; font-size: 14px; color: #718096;">
                <span>Already have an account? </span><a href="{{ route('login') }}"
                    style="color: #667eea; text-decoration: none;">Sign in</a>
            </div>
        </form>
</body>

</html>

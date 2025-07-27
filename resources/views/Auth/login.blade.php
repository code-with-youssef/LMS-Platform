<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            <div class="logo">🎓</div>
            <h1 class="login-title">Welcome Back</h1>
            <p class="login-subtitle">Sign in to your LMS account</p>
        </div>


        <form class="login-form" id="loginForm" method="POST" action="{{ route('login.login') }}">
            @csrf
            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <input type="email" id="email" class="form-input" name='email' placeholder="Enter your email"
                    required>
            </div>
            @error('email')
                <div class="error-message" style="color: red;">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name='password' class="form-input"
                    placeholder="Enter your password" required>
                @error('password')
                    <div class="error-message" style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="role">Login As</label>
                <select id="role" name ='role' class="form-select" required>
                    <option value="">Select your role</option>
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                      <option value="admin">Admin</option>
                </select>
                @error('role')
                    <div class="error-message" style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="login-button">Sign In</button>
            <div class="register-link" style="text-align: center; margin: 20px 0; font-size: 14px; color: #718096;">
                <span>Don't have an account? </span><a href="{{ route('register') }}"
                    style="color: #667eea; text-decoration: none;">Register</a>
            </div>
        </form>
</body>

</html>

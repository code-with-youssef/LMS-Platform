<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ]);

        $credentials = $request->only('email', 'password', 'role');

        $user = User::where('email', $credentials['email'])
            ->where('role', Str::lower($credentials['role']))
            ->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            switch ($user->role) {
                case 'teacher':
                    Auth::login($user);
                    return redirect()->route('teacher_dashboard');
                case 'student':
                    Auth::login($user);
                    return redirect()->route('student_dashboard');
                case 'admin':
                    Auth::login($user);
                    return redirect()->route('admin_dashboard');
            }
        }
        return redirect()->back()->withErrors(['email' => 'The email or password is not correct']);
    }
}

<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
      public function studentLogout(){
        Auth::logout();
        return redirect(route('login'));

    }

    public function teacherLogout(){
        Auth::logout();
        return redirect(route('login'));

    }

     public function adminLogout(){
        Auth::logout();
        return redirect(route('login'));

    }

}

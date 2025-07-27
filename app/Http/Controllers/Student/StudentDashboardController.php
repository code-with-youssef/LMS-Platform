<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function index()
    {
        return view('Student.dashboard');
    }
    public function books()
    {
        $books = Book::all();
        $role = Auth::user()->role;
        return view('Admin.books.index', compact('books','role'));
    }
}

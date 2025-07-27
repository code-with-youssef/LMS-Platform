<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        $role = Auth::user()->role;
        return view('Admin.books.index', compact('books', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $filePath = $request->file('pdf_file')->store('books', 'public');

        Book::create([
            'name' => $request->name,
            'path' => $filePath, // نخزن المسار كامل مش بس اسم الملف
        ]);

        return redirect()->route('adminBooks.index')->with('success', 'Book uploaded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        if ($book->path && Storage::disk('public')->exists($book->path)) {
            Storage::disk('public')->delete($book->path);
        }
        $book->delete();
        return redirect(route('adminBooks.index'))->with('success', 'Book deleted successfully.');
    }
}

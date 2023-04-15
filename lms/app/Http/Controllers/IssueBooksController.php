<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Branch;
use App\Models\IssueBook;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IssueBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $br = Book::get();
        $st = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')->get();

        //show the table value 
        $bi = Db::table('issue_books')
            ->join('students', 'students.id', '=', 'issue_books.studentId')
            ->join('books', 'books.id', '=', 'issue_books.booksId')->get();
        // $st = Student::get();
        return View('issuebook.create', compact('br', 'st', 'bi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $bi = new IssueBook();
        $bi->studentId = $request['studentId'];
        $bi->booksId = $request['booksId'];
        $bi->status = $request['status'];
        try {
            $bi->save();
            return redirect(route('book-issue.index'))->with('success', 'Book Issue Created successfully');

            //code...
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        return view('issuebook.edit');
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
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\IssueBook;
use Exception;
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

        $updateBooksId = $request['booksId'];

        if ($bi->status == 'Pending') {
            $rechecking = Book::find($updateBooksId);

            if ($rechecking->copyNumber !=0) {
                // dd($rechecking->copyNumber);
                $rechecking->remainingCopy = $rechecking->remainingCopy - 1;
                $rechecking->update();
            } else {
                return "books number can't be negative";
            }
        } else if ($bi->status == 'Return') {
            $update = Book::find($updateBooksId);
            if ($update->copyNumber >= $update->remainingCopy) {
                $update->remainingCopy = $update->remainingCopy + 1;
                $update->update();
            } else {
                return "Original Number of copy not getter then remaining copy ";
            }
        } else {
            return "Something Went Wrong";
        }
        try {
            $bi->save();
            return redirect(route('book-issue.index'))->with('success', 'Book Issue Created successfully');
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
        $br = Book::get();
        //show the table value 
        $bi = Db::table('issue_books')
            ->join('students', 'students.id', '=', 'issue_books.studentId')
            ->join('books', 'books.id', '=', 'issue_books.booksId')->get();

        $editIssue = IssueBook::with(
            [
                'students' => function ($q) {
                    $q->select(['studentId']);
                },

                'books' => function ($q) {
                    $q->select(['id',  'name']);
                }
            ]
        )->find($id);

        return view('issuebook.edit', compact('br', 'bi', 'editIssue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bi =  IssueBook::find($id);
        $bi->studentId = $request['studentId'];
        $bi->booksId = $request['booksId'];
        $bi->status = $request['status'];

        $updateBooksId = $request['booksId'];

        if ($bi->status == 'Pending') {
            $rechecking = Book::find($updateBooksId);
            $rechecking->remainingCopy = $rechecking->remainingCopy - 1;
            $rechecking->update();
        } else if ($bi->status == 'Return') {
            $update = Book::find($updateBooksId);
            $update->remainingCopy = $update->remainingCopy + 1;
            $update->update();
        } else {
            return "Something Went Wrong";
        }
        try {
            $bi->save();
            return redirect(route('book-issue.index'))->with('success', 'Book Issue Created successfully');

            //code...
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {


            IssueBook::find($id)->delete();
            return redirect(route('book-issue.index'))->with('success', 'User Deleted Successfully');
        } catch (Exception $e) {

            return [
                "message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }
}

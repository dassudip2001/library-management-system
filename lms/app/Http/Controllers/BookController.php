<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('books.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->description = $request->description;
        $book->publicationId = $request['publicationId'];
        try {
            $book->save();
            return redirect(route('book.index'))->with('success', 'created successfully');
        } catch (\Throwable $th) {
            //throw $th;
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
        $book = Book::find($id);
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $books = Book::find($id);
            $books->description = $request->description;
            $books->publicationId = $request['publicationId'];
            $books->save();
            return redirect(route('book.index'))->with('success', 'Book Update Successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::destroy($id);
        return redirect(route('book.index'))->with('success', 'Books Deleted successfully');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pub = Publication::get();
        $books = Book::latest()->paginate(5);

        $book = DB::table('books')
            ->join('publications', 'publications.id', '=', 'books.publicationId')
            ->paginate(5);

        // return view('index', compact('products'))
        // ->with('i', (request()->input('page', 1) - 1) * 5);

        return view('books.create', compact('pub', 'books', 'book'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'publicationId' => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Book::create($input);

        return redirect()->route('books.index')
            ->with('success', 'Books created successfully.');
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
        return redirect(route('books.index'))->with('success', 'Books Deleted successfully');
    }
}
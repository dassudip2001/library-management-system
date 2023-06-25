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
            ->paginate(3);

        // return view('index', compact('products'))
        // ->with('i', (request()->input('page', 1) - 1) * 5);

        return view('books.create', compact('pub', 'books', 'book'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'copyNumber' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'publicationId' => 'required'
        ]);


        $input = new Book();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        $input->name = $request['name'];
        $input->description = $request['description'];
        $input->copyNumber = $request['copyNumber'];
        $input->remainingCopy = $request['copyNumber'];
        $input->publicationId = $request['publicationId'];


        // $input = $request->all();

        try {
            $input->save();
            //code...
            return redirect()->route('books.index')
                ->with('success', 'Books created successfully.');
        } catch (\Throwable $th) {
            throw $th;
        }

        // Book::create($input);

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
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'name' => 'required',

        // ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        Book::update($input);

        return redirect()->route('index')
            ->with('success', 'Product updated successfully');
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
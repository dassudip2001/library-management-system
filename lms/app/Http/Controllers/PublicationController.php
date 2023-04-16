<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $st = DB::table('users')
        //     ->join('students', 'students.id', '=', 'users.id')->get();
        $publication = Publication::latest()->paginate(5);

        return view('publication.create', compact('publication'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'publicationsName' => 'required|unique:publications',

        ]);
        $pub = new Publication();
        $pub->publicationsName = $request->publicationsName;
        $pub->publicationDeatils = $request->publicationDeatils;
        try {
            $pub->save();
            return redirect(route('publications.index'))
                ->with('success', 'publication Create Successfully');
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
        $project = Publication::find($id);

        return view('publication.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $pub = Publication::find($id);
            $pub->publicationsName = $request->publicationsName;
            $pub->publicationDeatils = $request->publicationDeatils;
            $pub->save();
            return redirect(route('publications.index'))
                ->with('success', 'publication Update Successfully');
        } catch (Exception $e) {

            return [
                "message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Publication::destroy($id);
        return redirect(route('publications.index'))
            ->with('success', 'publication Delete Successfully');
    }
}

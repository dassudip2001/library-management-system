<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Exception;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('publication.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $pub = new Publication();
        $pub->publicationsname = $request->publicationsname;
        $pub->publicationDeatils = $request->publicationDeatils;
        try {
            $pub->save();
            return redirect(route('publication.index'))
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
            $pub->publicationsname = $request->publicationsname;
            $pub->publicationDeatils = $request->publicationDeatils;
            $pub->save();
            return redirect(route('publication.index'))
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
        return redirect(route('publication.index'))
            ->with('success', 'publication Delete Successfully');
    }
}
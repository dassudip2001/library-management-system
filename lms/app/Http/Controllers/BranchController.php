<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('branch.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $b = new Branch();
        $b->branchName = $request->branchName;
        $b->branchCode = $request->branchCode;
        $b->branchDescribption = $request->branchDescribption;

        try {
            $b->save();
            return redirect(route('branch.index'))->with('success', 'Branch Created successfully');
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
        $b = Branch::find($id);
        return view('publication.edit', compact('b'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $b = Branch::find($id);
            $b->branchName = $request->branchName;
            $b->branchCode = $request->branchCode;
            $b->branchDescribption = $request->branchDescribption;
            $b->save();
            return redirect(route('branch.index'))->with('success', 'Branch Created Successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Branch::destroy($id);
        return redirect(route('publications.index'))->with('success', 'Branch created successfully');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Panalty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanaltiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $st = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')->get();

        $pn = DB::table('panalties')
            // ->join('students', 'students.user_id', '=', 'users.id')
            ->join('students', 'students.id', '=', 'panalties.studentId')
            ->get();

        // $pn = DB::table('panalties')
        //     ->join('students', 'students.user_id', '=', 'panalties.studentId')->get();
        return view('panalties.create', compact('st', 'pn'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $pn = new Panalty();
        $pn->penaltyResign = $request['penaltyResign'];
        $pn->price = $request['price'];
        $pn->studentId = $request['studentId'];
        try {
            $pn->save();
            return
                redirect(route('penalties.index'))->with('success', 'Branch Created successfully');
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
    public function destroy(string $id)
    {
        try {
            Panalty::find('id', $id)->delete();
            return redirect(route('penalties.index'))->with('success', 'Books Deleted successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Student;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $br = Branch::get();
        $student = DB::table('users')
            ->join('students', 'students.user_id', '=', 'users.id')->get();
        return view('student.create', compact('br', 'student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'studentId' => 'required|string',
            'phone' => 'string',
            'branchId' => 'required',


        ]);
        $fields = $request->only([
            'name', 'email', 'password', 'branchId', 'phone', 'studentId', 'user_id'
        ]);
        $user = new User([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);
        $user->save();

        $pivot = new Student();
        // student details
        $pivot->user_id = $user->id;
        $pivot->phone = $fields['phone'];
        $pivot->studentId = $fields['studentId'];
        $pivot->branchId = $fields['branchId'];



        try {

            $pivot->save();
            return redirect()->route('create-student.index')
                ->with('success', 'student created successfully.');
            //
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
        $showDept = Branch::all();

        $createUser = Student::with(
            [
                'user' => function ($q) {
                    $q->select(['id', 'name', 'email',]);
                },

                'branch' => function ($q) {
                    $q->select(['id',  'branchName', 'branchCode']);
                }
            ]
        )->find($id);
        return view('student.edit', compact('createUser', 'showDept'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                // 'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|confirmed|min:8',
                'branchId' => 'required'

            ]);
            $fields = $request->only([
                'name', 'email', 'password', 'branchId', 'phone', 'studentId', 'user_id'
            ]);

            $uc = Student::find($id)->user_id;


            $user = User::find($uc);
            $user->name = $fields['name'];
            $user->email = $fields['email'];

            $user->password = bcrypt($fields['password']);
            $user->save();

            $updateCreateUser = Student::find($id);
            $updateCreateUser->phone = $fields['phone'];
            $updateCreateUser->studentId = $fields['studentId'];
            $updateCreateUser->branchId = $fields['branchId'];

            $updateCreateUser->save();
            return redirect(route('create-student.index'))
                ->with('success', 'User Update Successfully');
            //code...
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
        try {


            $uc = Student::find($id)->user_id;
            User::find($uc)->delete();
            return redirect(route('create-student.index'))->with('success', 'User Deleted Successfully');
        } catch (Exception $e) {

            return [
                "message" => $e->getMessage(),
                "status" => $e->getCode()
            ];
        }
    }
}
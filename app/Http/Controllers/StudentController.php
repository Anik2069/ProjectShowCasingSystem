<?php

namespace App\Http\Controllers;

use App\member;
use App\project;
use App\student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = new User();
        $user->name = $request->full_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->userType = 3;
        $user->save();
        //Student Table
        $student = new student();
        $student->name = $request->full_name;
        $student->s_id = $request->s_id;
        $student->phone = $request->p_number;
        $student->institution = $request->instituion;
        $student->department = $request->department;
        $student->password = $request->password;
        $student->email = $request->email;;
        $student->program_id = $request->program_id;
        $student->user_no_fk = $user->id;
        $student->status = 1;
        $student->status = 1;
        $student->save();
        //Project
        $project = new project();
        $project->project_name = $request->p_name;
        $project->description = $request->p_description;
        $project->student_id = $student->id;
        $project->program_id = $request->program_id;
        $project->save();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\student $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        //User Table


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\student $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\student $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        //
    }

    public function student_list_judges($programId)
    {
        $id = Auth::id();
        $judges_id = member::where("user_no_fk", $id)->first();
        $judges_id = $judges_id->id;
        $program = DB::select("select programs.id,programs.program_name,students.name as st_name, members.name as sp_name,projects.project_name as p_name,programs.program_date, students.id as s_id from programs 
                    join assign_judges on assign_judges.program_id =  programs.id 
                    join students on students.program_id =  programs.id 
                    join projects on projects.student_id =students.id
                    join members on projects.supervisor_id =members.id
                    where assign_judges.judges_id = $judges_id and programs.id = $programId");


        /*  dd($program);*/
        return view("judges.student_list", compact("program","programId"));
    }
}

<?php

namespace App\Http\Controllers;

use App\project;
use App\student;
use App\User;
use Illuminate\Http\Request;
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
        $user->userType = 3 ;
        $user->save();
        //Student Table
        $student = new student();
        $student->name =$request->full_name;
        $student->s_id = $request->s_id;
        $student->phone= $request->p_number;
        $student->institution = $request->instituion;
        $student->department= $request->department;
        $student->password = $request->password;
        $student->email =$request->email;;
        $student->program_id= $request->program_id;
        $student->user_no_fk= $user->id;
        $student->status= 1;
        $student->status= 1;
        $student->save() ;
        //Project
        $project = new project();
        $project->project_name = $request->p_name;
        $project->description = $request->p_description;
        $project->student_id = $student->id;
        $project->program_id =  $request->program_id;
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
}

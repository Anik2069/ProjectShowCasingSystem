<?php

namespace App\Http\Controllers;

use App\program;
use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class publicview extends Controller
{
    //
    public function index()
    {
        $program = DB::table("programs")->join("banners", "programs.id", "banners.program_id")
            ->leftjoin("conveners", "programs.insertedBy", "conveners.user_no_fk")
            ->leftJoin("panels", "conveners.id", "panels.assign_subadmin")->where("programs.status", 1)->get();


        return view("public.index", compact("program"));
    }

    public function result()
    {
        $program = DB::table("programs")->join("banners", "programs.id", "banners.program_id")->get();

        return view("public.result", compact('program'));

    }

    public function live_result($id = "", $name = "")
    {
        //$program = DB::table("programs")->join("banners", "programs.id", "banners.program_id")->get();

        $programDetails = program::find($id);
        //$student = DB::table("students")->join("projects","students.id","projects.student_id")->leftJoin("members","members.id","projects.supervisor_id")->get();
        $student =  DB::table("students")
            ->join("projects","students.user_no_fk","projects.student_id")
            ->leftjoin("members","members.id","projects.supervisor_id")
            ->select("students.id","projects.program_id","students.name","projects.project_name","members.name")
            ->where("projects.program_id",$id)
            ->get();

        dd($student);

        return view("public.live_result", compact('programDetails', 'student'));
    }

    public function studentRegistration()
    {
        return view("student.registration");
    }

    public function project_idea(Request $request)
    {
        $request->session()->push('project_idea', [
            'idea' => $request->input("p_name"),
            'program_id' => $request->input("program_id"),
            'description' => $request->input("p_description")
        ]);

        return redirect("/students/assign_program");
    }
}

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
     /*   $student = DB::table("results")
            ->join("projects", "results.s_id", "projects.student_id")
            ->join("students", "students.id", "results.s_id")
            ->join("programs", "programs.id", "results.program_id")
            ->leftJoin("members","members.id","projects.supervisor_id")
            ->select("results.s_id", "programs.program_name", "projects.project_name", "students.name", "students.phone",
                "students.institution", "students.email", "projects.description","members.name as members_name", "projects.supervisor_id", "programs.id as programs_id",
                DB::raw("sum(results.marks) as total_mark"))
            ->where("programs.id", $id)
            ->where("results.result_ind",1)
            ->groupBy("results.s_id", "students.name", "projects.project_name", "students.phone",
                "students.institution", "students.email", "projects.description",  "programs.id","members.name")
            ->get();*/
        $student = DB::table("results")
            ->join("projects", "results.s_id", "projects.student_id")
            ->join("students", "students.id", "results.s_id")
            ->join("programs", "programs.id", "results.program_id")
            ->select("results.s_id as id", "programs.program_name", "projects.project_name", "students.name", "students.phone",
                "students.institution", "students.email", "projects.description", "programs.id as programs_id",
                DB::raw("sum(results.marks) as total_mark"))

            ->groupBy("results.s_id", "students.name", "projects.project_name", "students.phone",
                "students.institution", "students.email", "projects.description",  "programs.id", "programs.program_name")
            ->get();



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

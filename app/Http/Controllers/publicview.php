<?php

namespace App\Http\Controllers;

use App\program;
use App\project;
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
        $student = DB::table("students")
            ->join("projects", "students.user_no_fk", "projects.student_id")
            ->leftjoin("members", "members.id", "projects.supervisor_id")
            ->select("students.id", "projects.program_id", "students.name", "projects.project_name", "members.name as members_name","students.user_no_fk")
            ->where("projects.program_id", $id)
            ->get();
        $result = DB::table("results")
            ->select("program_id", "s_id", DB::Raw("sum(marks) as total_marks"))
            ->where("results.program_id", $id)->where("result_ind", 1)
            ->groupBy("program_id", "s_id")->get();

        $marks_array = [];
        if (!empty($result)) {
            foreach ($result as $value) {
                $marks_array[$value->program_id][$value->s_id] = $value->total_marks;
            }
        }

        return view("public.live_result", compact('programDetails', 'student', 'marks_array'));
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

    public function student_profile($student_id, $program_id,$student_user_pk_no)
    {
        $student_info = student::find($student_id);
        $project_info = project::where("student_id",$student_user_pk_no )->where("program_id",$program_id)->first();

        return view("public.student_profile",compact("student_info","project_info"));

    }
}

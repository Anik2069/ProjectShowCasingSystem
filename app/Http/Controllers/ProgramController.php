<?php

namespace App\Http\Controllers;

use App\banner;
use App\panel;
use App\program;
use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    //
    public function index()
    {
        $panel_info = DB::table("panels")
            ->join("conveners", "conveners.id", "panels.assign_subadmin")
            ->join("users", "users.id", "conveners.user_no_fk")
            ->select("panels.org_name", "panels.purpose", "panels.id", "panels.sub_program", "panels.participant", "panels.noofsupervisor",
                "panels.judges", "panels.p_status", "panels.p_method", "panels.poster")
            ->where("users.id", Auth::id())->get();
        return view("convener.create_program", compact("panel_info"));
    }

    public function store(Request $request)
    {
        $program = new program();
        $program->program_name = $request->p_name;
        $program->purpose = $request->purpose;
        $program->no_of_student = $request->numberOfStudent;
        $program->no_of_judges = $request->numberofjudges;
        $program->program_date = $request->p_date;
        $program->lastDateOfRegistration = $request->last_date;
        $program->p_method = $request->p_method;
        $program->txid = $request->txid;
        $program->program_name = $request->p_name;
        $program->status = "1";
        $program->insertedBy = Auth::id();
        $program->panel_info = $request->panel_info;
        $program->save();
        $LastInsertId = $program->id;
        //$banner_txt = $request->banner_txt;
        //$banner_img = $request->image;
        $banner = new banner();
        $banner->banner_text = $request->banner_txt;

        if ($request->hasFile('b_image')) {
            $file = $request->file('b_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '1.' . $extension;
            $file->move('uploads/banner/', $filename);
            $banner->image = $filename;
        }
        $banner->program_id = $LastInsertId;
        $banner->inserted_by = Auth::id();
        $banner->save();
        // return redirect("/convener/program")->with("success", "Programe Inserted Succeefully !!!!");
    }

    public function view_program()
    {
        $id = Auth::id();
        $program = DB::select("select programs.id,programs.program_name,programs.purpose,programs.program_date, programs.status,
                    count(projects.student_id) as studentCount from programs 
                    left join projects on projects.program_id =  programs.id 
                    where programs.insertedBy = $id
                    group by programs.program_name,programs.purpose,programs.program_date,programs.id,programs.status");
        return view("convener.program_info", compact("program"));
    }

    public function view_program_judges()
    {
        $program = DB::select("select programs.id,programs.program_name,programs.purpose,programs.program_date,
                    count(projects.student_id) as studentCount from programs 
                    join assign_judges on assign_judges.program_id =  programs.id 
                    join projects on  projects.program_id =  programs.id 
                    group by programs.program_name,programs.purpose,programs.program_date,programs.id");
        /*  dd($program);*/
        return view("judges.program_info", compact("program"));
    }

    public function view_program_student()
    {
        $user_id = Auth::id();
        $program = DB::select("select programs.id,programs.program_name,programs.purpose,programs.program_date, projects.project_name,
                    count(projects.student_id) as studentCount from programs 
                    left join assign_judges on assign_judges.program_id =  programs.id 
                    join projects on  projects.program_id =  programs.id 
                    join students on students.user_no_fk = projects.student_id where  students.user_no_fk = $user_id 
                    group by programs.program_name,programs.purpose,programs.program_date,programs.id,projects.project_name");
        /*  dd($program);*/
        $type = 2;
        return view("student.program_info", compact("program", "type"));
    }

    public function view_program_student_list()
    {
        $user_id = Auth::id();
        $program = DB::select("select programs.id,programs.program_name,programs.purpose,programs.program_date, projects.project_name,
                    count(projects.student_id) as studentCount from programs 
                    left join assign_judges on assign_judges.program_id =  programs.id 
                    join projects on  projects.program_id =  programs.id 
                    join students on students.user_no_fk = projects.student_id where  students.user_no_fk = $user_id 
                    group by programs.program_name,programs.purpose,programs.program_date,programs.id,projects.project_name");
        /*  dd($program);*/
        $type = 1;
        return view("student.program_info", compact("program", "type"));
    }

    public function view_program_details($id)
    {
        $program = DB::table("programs")
            ->join("assign_judges", "assign_judges.program_id", "programs.id")
            ->join("projects", "projects.program_id", "programs.id")
            ->leftJoin("members", "projects.supervisor_id", "members.id")
            ->where("programs.id", $id)
            ->where("student_id", Auth::id())
            ->first();
        //dd($program);
        $student = student::where("user_no_fk", Auth::id())->first();
        return view("student.program_details", compact("program", "student"));
    }

    public function programList()
    {
        $program = DB::table("programs")->join("banners", "programs.id", "banners.program_id")->where("programs.program_date", date("Y-m-d"))->get();

        return view("public.event", compact("program"));
    }

    public function getProgramInfo()
    {
        $data_type = $_GET['data_type'];
        if ($data_type == 1) {
            $program = DB::table("programs")->join("banners", "programs.id", "banners.program_id")->where("programs.program_date", date("Y-m-d"))->get();
        } else if ($data_type == 2) {
            $program = DB::table("programs")->join("banners", "programs.id", "banners.program_id")->where([["programs.program_date", ">", date("Y-m-d")]])->get();
        } else if ($data_type == 3) {
            $program = DB::table("programs")->join("banners", "programs.id", "banners.program_id")->where([["programs.program_date", "<", date("Y-m-d")]])->get();
        }
        return view("public.event_list", compact("program"));

    }

    public function view_all_participant()
    {
        $student = DB::table("projects")
            ->join("students", "students.user_no_fk", "projects.student_id")
            ->join("programs", "programs.id", "projects.program_id")
            ->where("programs.insertedBy", Auth::id())
            ->get();
        // dd($student);
        return view("convener.participant_list", compact("student"));
    }

    public function stop_program($status, $id)
    {
        $program_info = program::find($id);
        if ($status == 0)
            $program_info->status = 1;
        else
            $program_info->status = 0;
        $program_info->save();
        return redirect("/convener/view_program");
    }
}

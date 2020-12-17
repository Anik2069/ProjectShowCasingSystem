<?php

namespace App\Http\Controllers;

use App\banner;
use App\panel;
use App\program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    //
    public function index()
    {
        $panel_info = panel::where("assign_subadmin", Auth::id())->get();
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
        return view("convener.program_info");
    }

    public function view_program_judges()
    {
        $program = DB::select("select programs.id,programs.program_name,programs.purpose,programs.program_date,
                    count(students.id) as studentCount from programs 
                    join assign_judges on assign_judges.program_id =  programs.id 
                    join students on students.program_id =  programs.id 
                    group by programs.program_name,programs.purpose,programs.program_date,programs.id");
        /*  dd($program);*/
        return view("judges.program_info", compact("program"));
    }

    public function programList()
    {
        $program = DB::table("programs")->join("banners", "programs.id", "banners.program_id")->where("programs.program_date",date("Y-m-d"))->get();

        return view("public.event", compact("program"));
    }
    public function getProgramInfo(){
        $data_type = $_GET['data_type'];
        if($data_type==1){
            $program = DB::table("programs")->join("banners", "programs.id", "banners.program_id")->where("programs.program_date",date("Y-m-d"))->get();
        }else if($data_type==2){
            $program = DB::table("programs")->join("banners", "programs.id", "banners.program_id")->where([["programs.program_date",">",date("Y-m-d")]])->get();
        }else if($data_type==3){
            $program = DB::table("programs")->join("banners", "programs.id", "banners.program_id")->where([["programs.program_date","<",date("Y-m-d")]])->get();
        }
        return view("public.event_list", compact("program"));

    }
}

<?php

namespace App\Http\Controllers;

use App\banner;
use App\panel;
use App\program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


        $banner_txt = $request->banner_txt;
        //$banner_img = $request->image;
        for ($i = 0; $i < count($banner_txt); $i++) {
            $banner = new banner();
            $banner->banner_text = $banner_txt[$i];
            if ($request->hasFile('b_image' . $i)) {
                $file = $request->file('b_image' . $i);
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '1.' . $extension;
                $file->move('uploads/banner/', $filename);
                $banner->image = $filename;
            }
            $banner->inserted_by= Auth::id();
            $banner->save();
        }


        // return redirect("/convener/program")->with("success", "Programe Inserted Succeefully !!!!");
    }

    public function view_program()
    {
        return view("convener.program_info");
    }
}

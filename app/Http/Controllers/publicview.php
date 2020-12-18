<?php

namespace App\Http\Controllers;

use App\program;
use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class publicview extends Controller
{
    //
    public function index()
    {
        $program = DB::table("programs")->join("banners", "programs.id", "banners.program_id")->get();

        return view("public.index", compact("program"));
    }

    public function result()
    {
        $program = DB::table("programs")->join("banners", "programs.id", "banners.program_id")->get();

        return view("public.result",compact('program'));

    }
    public function live_result($id="",$name=""){
        //$program = DB::table("programs")->join("banners", "programs.id", "banners.program_id")->get();

        $programDetails = program::find($id);

        $student = DB::table("students")->join("projects","students.id","projects.student_id")
            ->leftJoin("members","members.id","projects.supervisor_id")->get();

        return view("public.live_result",compact('programDetails','student'));
    }
}

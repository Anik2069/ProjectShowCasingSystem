<?php

namespace App\Http\Controllers;

use App\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public  function  assign_program(Request $request){
        $project = new project();
        $data = $request->session()->get("project_idea");

        $project->project_name = $data[0]["idea"];
        $project->description = $data[0]["program_id"];
        $project->student_id = Auth::id();
        $project->program_id =$data[0]["program_id"];
        $project->save();
        return redirect("/administration/dashboard");
    }

}

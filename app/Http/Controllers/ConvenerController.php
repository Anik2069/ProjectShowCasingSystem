<?php

namespace App\Http\Controllers;

use App\convener;
use App\member;
use App\panel;
use App\program;
use App\project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ConvenerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view("administration.sub_admin");
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->userType = "2";
        $user->save();
        //Convener
        $convener = new convener();
        $convener->name = $request->name;
        $convener->email = $request->email;
        $convener->mobile = $request->mobile;
        $convener->address = $request->address;
        $convener->dob = $request->dob;
        $convener->organization = $request->organization;
        $convener->org_address = $request->org_address;
        $convener->status = $request->status;
        $convener->insertBy = Auth::id();
        $convener->user_no_fk = $user->id;
        $convener->save();

        return redirect("/administration/convener")->with("success", "Covener Added !!");
    }

    public function view_panel()
    {
        $panel_info = panel::where("assign_subadmin", Auth::id())->get();
        return view("convener.panel_info", compact("panel_info"));
    }

    public function studentList()
    {
        $studentlist = DB::table("students")
            ->join("programs", "students.program_id", "programs.id")
            ->join("projects", "projects.student_id", "students.id")
            ->where("programs.insertedBy", Auth::id())->get();
        $supervisor = member::whereIn("role_type", [2, 3])->where("insertBy", Auth::id())->get();
        return view("convener.participant", compact("studentlist", "supervisor"));
    }

    public function assignSupervisor(Request $request)
    {
        $studentlist = DB::table("students")
            ->join("programs", "students.program_id", "programs.id")
            ->join("projects", "projects.student_id", "students.id")
            ->where("programs.insertedBy", Auth::id())
            ->select("projects.id as project_id")
            ->where("students.id", $request->id)->get();
        // dd($studentlist[0]->project_id);
        $projectInfo = project::find($studentlist[0]->project_id);
        $projectInfo->supervisor_id = $request->supervisorID;
        $projectInfo->save();
    }

    public function resultCriteria()
    {
        $prgram = program::where([
            ['insertedBy', '=', Auth::id()],
            ['status', '=', 1],
        ])->get();
        $result_criteria = DB::table("result_criterias")
            ->join("programs", "result_criterias.program", "programs.id")
            ->where('insertedBy', Auth::id())->get();
        return view("convener.result_criteria", compact('prgram', 'result_criteria'));
    }

    public function assign_judges()
    {
        $prgram = program::where([
            ['insertedBy', '=', Auth::id()],
            ['status', '=', 1],
        ])->get();

        $member = member::whereIn("role_type", [1, 3])->where("insertBy", Auth::id())->get();

        $information = DB::table("assign_judges")
            ->join("programs", "programs.id", "assign_judges.program_id")
            ->join("members", "members.id", "assign_judges.judges_id")
            ->where("assign_judges.insertedBy", Auth::id())
            ->get();
        return view("convener.assign_judges", compact("prgram", "member","information"));
    }
}

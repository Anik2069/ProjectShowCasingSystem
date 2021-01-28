<?php

namespace App\Http\Controllers;

use App\convener;
use App\member;
use App\panel;
use App\program;
use App\project;
use App\result;
use App\ResultCriteria;
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
        //panel::where("assign_subadmin", Auth::id())->get();
        $panel_info = DB::table("panels")
            ->join("conveners", "conveners.id", "panels.assign_subadmin")
            ->join("users", "users.id", "conveners.user_no_fk")
            ->select("panels.org_name", "panels.purpose", "panels.id", "panels.sub_program", "panels.participant", "panels.noofsupervisor",
                "panels.judges", "panels.p_status", "panels.p_method", "panels.poster")
            ->where("users.id", Auth::id())->get();
        return view("convener.panel_info", compact("panel_info"));
    }

    public function studentList($id)
    {
        $studentlist = DB::table("projects")
            ->join("students", "students.user_no_fk", "projects.student_id")
            ->join("programs", "programs.id", "projects.program_id")
            ->select("students.id", "programs.program_name", "projects.project_name", "students.name", "students.phone",
                "students.institution", "students.email", "projects.description", "projects.supervisor_id")
            ->where("programs.insertedBy", Auth::id())->where("programs.id", $id)
            ->get();
        $supervisor = member::whereIn("role_type", [2, 3])->where("insertBy", Auth::id())->get();
        return view("convener.participant", compact("studentlist", "supervisor"));
    }

    public function assignSupervisor(Request $request)
    {
        $studentlist = DB::table("students")
            ->join("projects", "projects.student_id", "students.user_no_fk")
            ->join("programs", "projects.program_id", "programs.id")
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
            ->select("programs.program_name", "result_criterias.name", "result_criterias.marks", "result_criterias.prority", "result_criterias.id")
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
        return view("convener.assign_judges", compact("prgram", "member", "information"));
    }

    public function convenerList()
    {
        $convenerList = convener::where([
            ['insertBy', '=', Auth::id()]
        ])->get();
        return view("administration.convenerList", compact("convenerList"));
    }

    public function result_finalize_list($id)
    {
        $studentlist = DB::table("rresults")
            ->join("projects", "results.s_id", "projects.student_id")
            ->join("students", "students.id", "results.s_id")
            ->join("programs", "programs.id", "results.program_id")
            ->select("results.s_id as id", "programs.program_name", "projects.project_name", "students.name", "students.phone",
                "students.institution", "students.email", "projects.description", "programs.id as programs_id",
                DB::raw("sum(results.marks) as total_mark"))
            ->where("programs.insertedBy", Auth::id())->where("programs.id", $id)
            ->groupBy("results.s_id", "students.name", "projects.project_name", "students.phone",
                "students.institution", "students.email", "projects.description",  "programs.id", "programs.program_name")
            ->get();

        $programId = $id;
        return view("convener.result_info", compact("studentlist", "programId"));

    }

    public function check_marks()
    {
        $programId = $_GET["programId"];
        $resultCriteria = ResultCriteria::where("program", $programId)->get();
        $s_id = $_GET["s_id"];

        $marks = DB::table("results")
            ->select("members.name", "results.created_at", DB::Raw("sum(results.marks) as total_marks"))
            ->join("members", "members.user_no_fk", "results.judges_id")
            ->where([
                ["program_id", "=", $programId],
                ["s_id", "=", $s_id]
            ])->groupBy("members.name", "results.created_at")
            ->get();

        $route = '';
        if ($marks->isEmpty()) {
            $route = route("assignResult.store");
        } else {
            $route = route("assignResult.updateData");
        }

        return view("convener.open_modal", compact("resultCriteria", "s_id", "programId", "marks", "route"));

    }

    public function final_result($id)
    {
        $result = result::where("program_id", $id)->get();
        if(!empty($result)){
            foreach ($result as $value){
                $data = result::find($value->id);
                $data->result_ind = 1;
                $data->save();
            }
        }
        return redirect("/convener/result_finalize/".$id);
    }

}

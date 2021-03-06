<?php

namespace App\Http\Controllers;

use App\assign_judges;
use App\followup;
use App\member;
use App\program;
use App\result;
use App\ResultCriteria;
use App\student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view("convener.jud_supervisor");
    }

    public function store(Request $request)
    {
        //User Information

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make("12345678");
        if ($request->role_type == 1)
            $user->userType = "3";
        else
            $user->userType = "4";
        $user->save();

        $member = new member();
        $member->role_type = $request->role_type;
        $member->name = $request->name;
        $member->email = $request->email;
        $member->phone_number = $request->phone_number;
        $member->address = $request->address;
        $member->job = $request->job;
        $member->description = $request->description;
        $member->status = $request->status;
        $member->user_no_fk = $user->id;
        $member->insertBy = Auth::id();
        $member->save();


        return redirect("/convener/supervisor_judges")->with("success", "User Added");
    }

    public function judges()
    {
        $member = member::whereIn("role_type", [1, 3])->get();
        return view("convener.member", compact("member"));
    }

    public function assign_judges(Request $request)
    {
        $program_id = $request->p_name;
        $judges_id = $request->memberid;
        for ($i = 0; $i < count($judges_id); $i++) {
            $assign = new assign_judges();
            $assign->program_id = $program_id;
            $assign->judges_id = $judges_id[$i];
            $assign->insertedBy = Auth::id();
            $assign->save();
        }

        $information = DB::table("assign_judges")
            ->join("programs", "programs.id", "assign_judges.program_id")
            ->join("members", "members.id", "assign_judges.judges_id")
            ->where("assign_judges.insertedBy", Auth::id())
            ->get();
        return view("convener.assign_judges_data_result", compact("information"));
    }

    public function view_supervisor()
    {
        $member = member::whereIn("role_type", [2, 3])->get();
        return view("convener.member", compact("member"));
    }

    public function view_program_judges()
    {
        $program = program::all();
        return view("judges.program_info", compact("program"));

    }

    public function open_modal(Request $request)
    {
        if (Auth::user()->userType == 4) {
            $programId = $_GET["programId"];
            $student_id = $_GET["s_id"];
            $followup = followup::where([
                ["program_id", "=", $programId],
                ["student_id", "=", $student_id],
                ["supervisor_id", "=", Auth::id()]
            ])->orderBy("id", "desc")->get();
            return view("supervisor.open_modal", compact("programId", "student_id", "followup"));
        } else {
            $programId = $_GET["programId"];
            $resultCriteria = ResultCriteria::where("program", $programId)->get();
            $s_id = $_GET["s_id"];

            $marks = DB::table("results")->where([
                ["program_id", "=", $programId],
                ["s_id", "=", $s_id],
                ["judges_id", "=", Auth::id()]
            ])->get();
            $route = '';
            if($marks->isEmpty()){
                $route =  route("assignResult.store");
            }else{
                $route =  route("assignResult.updateData");
            }


            return view("judges.open_modal", compact("resultCriteria", "s_id", "programId", "marks","route"));
        }
    }

    public function open_followup(Request $request)
    {
        $student_id = student::where("user_no_fk",Auth::id())->first();
        $followup = followup::where([
            ["program_id", "=", $_GET["programId"]],
            ["student_id", "=",$student_id->id],
        ])->orderby("id", "desc")->get();

        return view("student.open_modal", compact("followup"));

    }
}

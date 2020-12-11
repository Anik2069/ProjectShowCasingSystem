<?php

namespace App\Http\Controllers;

use App\assign_judges;
use App\member;
use App\program;
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

        $user  = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make("12345678");
        $user->userType = "3";
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
            ->join("members","members.id","assign_judges.judges_id")
            ->where("assign_judges.insertedBy",Auth::id())
            ->get();
        return view("convener.assign_judges_data_result",compact("information"));
    }
    public function view_supervisor()
    {
        $member = member::whereIn("role_type", [2, 3])->get();
        return view("convener.member", compact("member"));
    }
    public function view_program_judges(){
        $program = program::all();
        return view("judges.program_info",compact("program"));

    }
}

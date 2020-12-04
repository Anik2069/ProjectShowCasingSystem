<?php

namespace App\Http\Controllers;

use App\assign_judges;
use App\member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    //
    public function index()
    {
        return view("convener.jud_supervisor");
    }

    public function store(Request $request)
    {
        $member = new member();
        $member->role_type = $request->role_type;
        $member->name = $request->name;
        $member->email = $request->email;
        $member->phone_number = $request->phone_number;
        $member->address = $request->address;
        $member->job = $request->job;
        $member->description = $request->description;
        $member->status = $request->status;
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
}

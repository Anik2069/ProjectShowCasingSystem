<?php

namespace App\Http\Controllers;

use App\member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    //
    public function index(){
        return view("convener.jud_supervisor");
    }
    public function store(Request $request){
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
        return redirect("/convener/supervisor_judges")->with("success","User Added");
    }
    public  function judges(){
        $member = member::whereIn("role_type",[1,3])->get();
        return view("convener.member",compact("member"));
    }
}

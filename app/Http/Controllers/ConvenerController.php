<?php

namespace App\Http\Controllers;

use App\convener;
use App\panel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ConvenerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view("administration.sub_admin");
    }
    public function store(Request $request){
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
        $convener->save();
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password =Hash::make( $request->password);
        $user->userType ="2";
        $user->save();
        return redirect("/administration/convener")->with("success","Covener Added !!");
    }

    public function view_panel(){
        $panel_info = panel::where("assign_subadmin",Auth::id())->get();
        return view("convener.panel_info",compact("panel_info"));
    }
}

<?php

namespace App\Http\Controllers;

use App\convener;
use App\panel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{
    //

    public function index(){
        $conveners = convener::where([
            ["status","=",1],
            ["insertBy","=",Auth::id()]
        ])->get();
        return view("administration.create_panel",compact("conveners"));
    }
    public function store(Request $request){
        $panel_info = new panel();
        $panel_info->org_name = $request->org_name;
        $panel_info->purpose = $request->purpose;
        $panel_info->poster = $request->poster;
        $panel_info->sub_program = $request->sub_program;
        $panel_info->participant = $request->participant;
        $panel_info->noofsupervisor = $request->noofsupervisor;
        $panel_info->judges = $request->judges;
        $panel_info->subadmin = $request->subadmin;
        $panel_info->p_status = $request->p_status;
        $panel_info->p_method = $request->p_method;
        $panel_info->txid = $request->txid;
        $panel_info->assign_subadmin = $request->assign_subadmin;
        $panel_info->insertBy = Auth::id();
        $panel_info->status = $request->status;
        $panel_info->save();
        return redirect("/administration/create_panel")->with("success","Panel Inserted !!!!!!");
    }
    public function view(){
       // $user  = Auth::user();
       // dd($user->name);
        $value = panel::orderBy("id","desc")->get();
        return view("administration.panel_view",compact("value"));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class publicview extends Controller
{
    //
    public function index(){
        $program = DB::table("programs")->join("banners","programs.id","banners.program_id")->get();

        return view("public.index",compact("program"));
    }
}

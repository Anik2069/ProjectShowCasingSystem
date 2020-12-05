<?php

namespace App\Http\Controllers;

use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class administration extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view("administration.login");
    }

    public function dashboard()
    {
        $user = Auth::user();
        if ($user->userType == 1) {
            return view("administration.index");
        }elseif($user->userType == 3){
            return view("judges.index");
        }
        else {
            return view("convener.index");
        }

    }




}

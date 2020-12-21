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
        //1 for admin ........... 2 for Convener ..... 3,4 Judges or SuperVisor  .....5 for student
        $user = Auth::user();
        if ($user->userType == 1) {
            return view("administration.index");
        }elseif($user->userType == 3){
            return view("judges.index");
        }
        elseif($user->userType == 5){
            return view("student.index");
        }
        else {
            return view("convener.index");
        }

    }




}

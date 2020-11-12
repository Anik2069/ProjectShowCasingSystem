<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class administration extends Controller
{
    //

    public  function  index(){
        return view("administration.login");
    }
    public function dashboard(){
        return view("administration.master");
    }


}

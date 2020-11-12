<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvenerController extends Controller
{
    //

    public function index(){
        return view("administration.sub_admin");
    }
}

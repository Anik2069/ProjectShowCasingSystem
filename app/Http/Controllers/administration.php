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
        } elseif ($user->userType == 3) {
            return view("judges.index");
        } elseif ($user->userType == 5) {
            return view("student.index");
        } elseif ($user->userType == 4) {
            return view("supervisor.index");
        }
        else {
            return view("convener.index");
        }

    }

    public function program()
    {
        $program = DB::select("select programs.id,programs.program_name,programs.purpose,programs.program_date,
                    count(projects.student_id) as studentCount from programs 
                    join projects on projects.program_id =  programs.id 
                    group by programs.program_name,programs.purpose,programs.program_date,programs.id");
        return view("administration.program_info", compact("program"));
    }

    public function report()
    {
        return view("administration.report");
    }

    public function searchReport(Request $request)
    {
        $date = $request->date1; $date = $request->date2;
        $searchData = DB::select("select a.program_name, a.purpose,a.lastDateOfRegistration,a.program_date,count(b.id) as studentNumber 
                                            from programs a inner join projects b on a.id= b.program_id group by a.program_name, a.purpose,a.lastDateOfRegistration,a.program_date 
                                            ");
        return view("administration.report_data",compact("searchData"));
    }


}

<?php

namespace App\Http\Controllers;

use App\student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        //dd($user);
        if ($user->userType == 1) {
            return view("administration.index");
        } elseif ($user->userType == 3) {
            return view("judges.index");
        } elseif ($user->userType == 5) {
            return view("student.index");
        } elseif ($user->userType == 4) {
            return view("supervisor.index");
        } else {
            return view("convener.index");
        }

    }

    public function program($id)
    {

        $program = DB::select("select programs.id,programs.program_name,programs.purpose,programs.program_date,
                    count(projects.student_id) as studentCount,programs.status from programs 
                    join projects on projects.program_id =  programs.id 
                    where panel_info = $id
                    group by programs.program_name,programs.purpose,programs.program_date,programs.id,programs.status");
        return view("administration.program_info", compact("program"));
    }

    public function report()
    {
        return view("administration.report");
    }

    public function searchReport(Request $request)
    {
        $date = $request->date1;
        $date = $request->date2;
        $searchData = DB::select("select a.program_name, a.purpose,a.lastDateOfRegistration,a.program_date,count(b.id) as studentNumber 
                                            from programs a inner join projects b on a.id= b.program_id group by a.program_name, a.purpose,a.lastDateOfRegistration,a.program_date 
                                            ");
        return view("administration.report_data", compact("searchData"));
    }

    public function studentList($id)
    {
        $studentList =  DB::select("select students.id,students.name,students.phone,students.institution,students.department 
                from students join projects on students.user_no_fk=projects.student_id join programs on projects.program_id = programs.id 
                where  programs.panel_info = $id");
        return view("administration.student_info",compact("studentList"));

    }
    public function changePassword(){

        return view("administration.changePassword");
    }
    public function changePassword_update(Request $request){
        $user_info = Auth::user();
        if($request->new_pass == $request->confirm_pass ){
            if (Hash::check($request->old_pass,$user_info->password)) {
                $userdata = User::find($user_info->id);
                $userdata->password= Hash::make($request->confirm_pass);
                $userdata->save();
                return redirect("/users/change_password")->with("success","Password Changed.");

            }else{
                return redirect("/users/change_password")->with("error","Old Password does not match");

            }
        }else{
            return redirect("/users/change_password")->with("error","Password does not match");
        }

    }

}

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
// Public View
Route::get("/", "publicview@index");
Route::get("/program", "ProgramController@programList")->name("public.programList");
Route::get("/getProgramInfo", "ProgramController@getProgramInfo");

Route::get("/result","publicview@result");
Route::get("/gotolive/{id?}/{name?}","publicview@live_result");
Route::get("/registation","publicview@studentRegistration")->name("registration");


Route::get('/home', 'administration@dashboard')->name('home');
//Adminstration
Route::get("/administration/login", "administration@index");
Route::get("/administration/dashboard", "administration@dashboard");

Route::get("/administration/program", "administration@program")->name("admin.program");
Route::get("/administration/dashboard", "administration@dashboard")->name("admin.index");
Route::get("/administration/dashboard", "administration@dashboard")->name("admin.index");
Route::get("/administration/dashboard", "administration@dashboard")->name("admin.index");

Route::get("/administration/report", "administration@report")->name("admin.report");
Route::post("/administration/report", "administration@searchReport")->name("searchReport");


Route::get("/administration/convener", "ConvenerController@index");
Route::post("/administration/convener", "ConvenerController@store")->name("convener.store");
Route::get("/administration/create_panel", "PanelController@index");
Route::post("/administration/create_panel", "PanelController@store")->name("panel.store");
Route::get("/administration/view_panel", "PanelController@view");
//Convener
Route::get("/convener/view_panel", "ConvenerController@view_panel");
Route::post("/convener/store", "ProgramController@store")->name("programe.store");
Route::get("/convener/program", "ProgramController@index");
Route::get("/convener/view_program", "ProgramController@view_program");
Route::get("/convener/view_all_participant", "ProgramController@view_all_participant");
Route::get("/convener/supervisor_judges", "MemberController@index");
Route::post("/convener/supervisor_judges", "MemberController@store");
Route::get("/convener/view_supervisor", "MemberController@view_supervisor");
Route::get("/convener/view_judges", "MemberController@judges");
Route::get("/convener/studentList", "ConvenerController@studentList");
Route::get("/convener/resultCriteria", "ConvenerController@resultCriteria");
Route::post("/convener/resultCriteria", "ResultCriteriaController@store");
Route::get("/convener/assign_judges", "ConvenerController@assign_judges");
Route::post("/convener/assign_judges", "MemberController@assign_judges");
Route::post("/convener/assign/supervisor", "ConvenerController@assignSupervisor")->name("supervisor.store");
//Student
Route::post("/project_idea","publicview@project_idea")->name("project_idea");
Route::resource("student", "StudentController");
Route::resource("projectSubmissionCriteria", "ProjectsubmissionController");
//Authentication
Auth::routes();
//Judges
/*Route::get("/convener/view_panel","ConvenerController@view_panel");*/
/*Route::post("/convener/store","ProgramController@store")->name("programe.store");
Route::get("/convener/program","ProgramController@index");*/
/*Route::get("supervisor_judges","ProgramController@view_program_judges");*/
Route::get("/convener/supervisor_judges","MemberController@index");
Route::post("/convener/supervisor_judges","MemberController@store");
Route::get("/convener/view_supervisor","MemberController@view_supervisor");
Route::get("/convener/view_judges","MemberController@judges");
Route::get("/convener/studentList","ConvenerController@studentList");
Route::get("/convener/resultCriteria","ConvenerController@resultCriteria");
Route::get("/convener/projectSubmissionCriteria","ConvenerController@projectSubmissionCriteria");


Route::get("/convener/projectSubmission/{id}","ProjectsubmissionController@destroy");

Route::post("/convener/resultCriteria","ResultCriteriaController@store");
Route::get("/convener/assign_judges","ConvenerController@assign_judges");
Route::post("/convener/assign_judges","MemberController@assign_judges");
Route::post("/convener/assign/supervisor","ConvenerController@assignSupervisor")->name("supervisor.store");

Route::prefix('judges')->group(function () {
    Route::get("/view_program","ProgramController@view_program_judges");
    Route::get("/open_modal", "MemberController@open_modal");
    Route::get("/student_list/{id}","StudentController@student_list_judges")->name("judges.studentList") ;
    Route::resource("assignResult","ResultController");
    Route::post("assignResult/updateData","ResultController@updateData")->name("assignResult.updateData");
});

Route::prefix('students')->group(function () {
    Route::get("/assign_program","ProjectController@assign_program");
    Route::get("/view_program","ProgramController@view_program_student");
    Route::get("/view_program_list","ProgramController@view_program_student_list");
    Route::get("/submit_project/{id}","ProjectsubmissionController@submit_project")->name("student.submit_project");
    Route::get("/view_result","ResultController@index")->name("view_result");

    Route::get("/view_program_details/{id}","ProgramController@view_program_details")->name("student.program_details");

    Route::get("/open_modal", "MemberController@open_modal");
    Route::get("/student_list/{id}","StudentController@student_list_judges")->name("judges.studentList") ;
    Route::resource("assignResult","ResultController");
    Route::post("assignResult/updateData","ResultController@updateData")->name("assignResult.updateData");
});

Route::resource("followup","FollowupController");









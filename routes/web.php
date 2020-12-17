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
Route::get("/result","publicview@result");



Route::get('/home', 'administration@dashboard')->name('home');
//Adminstration
Route::get("/administration/login", "administration@index");
Route::get("/administration/dashboard", "administration@dashboard");
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
Route::resource("student", "StudentController");
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




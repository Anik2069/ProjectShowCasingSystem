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

Route::get('/', function () {
    return view('welcome');
});
Route::get("/administration/login","administration@index");
Route::get("/administration/dashboard","administration@dashboard");
Route::get("/administration/convener","ConvenerController@index");
Route::post("/administration/convener","ConvenerController@store")->name("convener.store");
Route::get("/administration/create_panel","PanelController@index");
Route::post("/administration/create_panel","PanelController@store")->name("panel.store");

Route::get("/administration/view_panel","PanelController@view");



Auth::routes();

Route::get('/home', 'administration@dashboard')->name('home');

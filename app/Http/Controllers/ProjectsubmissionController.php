<?php

namespace App\Http\Controllers;

use App\program;
use App\projectsubmission;
use App\ResultCriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectsubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prgram = program::where([
            ['insertedBy', '=', Auth::id()],
            ['status', '=', 1],
        ])->get();
        $result_criteria = DB::table("projectsubmissions")
            ->join("programs", "projectsubmissions.program", "programs.id")
            ->where('insertedBy', Auth::id())->get();
        return view("convener.project_criteria",compact("prgram","result_criteria"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $program = $request->p_name;
        $name = $request->name;
        $marks= $request->marks;
        $prority= $request->priority;
        for($i=0;$i<count($name);$i++){
            if($name[$i] !=null ){
                $criteria = new projectsubmission();
                $criteria->program=$program;
                $criteria->name= $name[$i];
                $criteria->marks= $marks[$i];
                $criteria->prority= $prority[$i];
                $criteria->inserted_by=Auth::id();
                $criteria->save();
            }

        }
        $result_criteria = DB::table("projectsubmissions")
            ->join("programs","projectsubmissions.program","programs.id")
            ->where('insertedBy',Auth::id())->get();
        return  view("convener.project_criteria_data",compact("result_criteria"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\projectsubmission  $projectsubmission
     * @return \Illuminate\Http\Response
     */
    public function show(projectsubmission $projectsubmission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\projectsubmission  $projectsubmission
     * @return \Illuminate\Http\Response
     */
    public function edit(projectsubmission $projectsubmission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\projectsubmission  $projectsubmission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projectsubmission $projectsubmission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\projectsubmission  $projectsubmission
     * @return \Illuminate\Http\Response
     */
    public function destroy(projectsubmission $projectsubmission)
    {
        //
    }
}

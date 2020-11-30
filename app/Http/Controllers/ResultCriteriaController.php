<?php

namespace App\Http\Controllers;

use App\ResultCriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResultCriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $program = $request->p_name;
        $name = $request->name;
        $marks= $request->marks;
        $prority= $request->priority;
        for($i=0;$i<count($name);$i++){
            if($name[$i] !=null ){
                $criteria = new ResultCriteria();
                $criteria->program=$program[$i];
                $criteria->name= $name[$i];
                $criteria->marks= $marks[$i];
                $criteria->prority= $prority[$i];
                $criteria->inserted_by=Auth::id();
                $criteria->save();
            }

        }

        $result_criteria = DB::table("result_criterias")
            ->join("programs","result_criterias.program","programs.id")
            ->where('insertedBy',Auth::id())->get();
        return  view("convener.result_criteria_data",compact("result_criteria"));

    }

    /**
     * Display the specified resource.
     *
     * @param \App\ResultCriteria $resultCriteria
     * @return \Illuminate\Http\Response
     */
    public function show(ResultCriteria $resultCriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ResultCriteria $resultCriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(ResultCriteria $resultCriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ResultCriteria $resultCriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResultCriteria $resultCriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ResultCriteria $resultCriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResultCriteria $resultCriteria)
    {
        //
    }
}

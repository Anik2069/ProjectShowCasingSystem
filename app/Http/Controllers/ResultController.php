<?php

namespace App\Http\Controllers;

use App\result;
use App\ResultCriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view("student.result");
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
        $prgoram = ResultCriteria::where("program", $request->p_id)->get();

        if (!empty($prgoram)) {
            foreach ($prgoram as $value) {

                $result = new result();
                $result->marks = $request->input($value->id);
                $result->h_marks = $value->marks;
                $result->priority = $value->prority;
                $result->c_name = $value->name;
                $result->program_id = $request->p_id;
                $result->judges_id = Auth::id(); //////Join with user no fk from user table
                $result->insertedBy = Auth::id();
                $result->s_id = $request->s_id;
                $request->result_ind= 0;
                $result->save();
            }
        }
        return redirect("/students/student_list/" . $request->p_id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\result $result
     * @return \Illuminate\Http\Response
     */
    public function show(result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\result $result
     * @return \Illuminate\Http\Response
     */
    public function edit(result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\result $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\result $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(result $result)
    {
        //
    }

    public function updateData(Request $request)
    {
        $data = $request->old_mark_id;
        $prgoram = ResultCriteria::where("program", $request->p_id)->get();
        $i = 0;
        if (!empty($prgoram)) {
            foreach ($prgoram as $value) {
                $result = result::find($data[$i]);
                $result->marks = $request->input($value->id);
                $result->h_marks = $value->marks;
                $result->priority = $value->prority;
                $result->c_name = $value->name;
                $result->program_id = $request->p_id;
                $result->judges_id = Auth::id(); //////Join with user no fk from user table
                $result->insertedBy = Auth::id();
                $result->s_id = $request->s_id;
                $request->result_ind = 0;
                $result->save();
                $i = $i+1;
            }
        }
        return redirect("/students/student_list/" . $request->p_id);
    }
}

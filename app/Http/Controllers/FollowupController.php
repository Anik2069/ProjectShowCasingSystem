<?php

namespace App\Http\Controllers;

use App\followup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowupController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $followup = new followup();
        $followup->student_id = $request->s_id;
        $followup->program_id = $request->p_id;
        $followup->supervisor_id = Auth::id();
        $followup->note = $request->note;
        $followup->date = $request->date;
        $followup->save();
        return redirect("/students/student_list/".$request->p_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function show(followup $followup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function edit(followup $followup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, followup $followup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\followup  $followup
     * @return \Illuminate\Http\Response
     */
    public function destroy(followup $followup)
    {
        //
    }
}

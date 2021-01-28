<?php

namespace App\Http\Controllers;

use App\contact_us;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("public.contact");
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
        $contact = new contact_us();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();
        return redirect("/contactus")->with("success","Message send successfully ");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\contact_us $contact_us
     * @return \Illuminate\Http\Response
     */
    public function show(contact_us $contact_us)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\contact_us $contact_us
     * @return \Illuminate\Http\Response
     */
    public function edit(contact_us $contact_us)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\contact_us $contact_us
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contact_us $contact_us)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\contact_us $contact_us
     * @return \Illuminate\Http\Response
     */
    public function destroy(contact_us $contact_us)
    {
        //
    }
}

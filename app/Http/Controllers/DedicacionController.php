<?php

namespace App\Http\Controllers;

use App\Models\Dedicacion;
use App\Http\Requests\StoreDedicacionRequest;
use App\Http\Requests\UpdateDedicacionRequest;

class DedicacionController extends Controller
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
     * @param  \App\Http\Requests\StoreDedicacionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDedicacionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dedicacion  $dedicacion
     * @return \Illuminate\Http\Response
     */
    public function show(Dedicacion $dedicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dedicacion  $dedicacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Dedicacion $dedicacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDedicacionRequest  $request
     * @param  \App\Models\Dedicacion  $dedicacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDedicacionRequest $request, Dedicacion $dedicacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dedicacion  $dedicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dedicacion $dedicacion)
    {
        //
    }
}

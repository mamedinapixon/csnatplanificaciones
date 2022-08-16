<?php

namespace App\Http\Controllers;

use App\Models\DocentePlanificacion;
use App\Http\Requests\StoreDocentePlanificacionRequest;
use App\Http\Requests\UpdateDocentePlanificacionRequest;

class DocentePlanificacionController extends Controller
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
     * @param  \App\Http\Requests\StoreDocentePlanificacionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocentePlanificacionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocentePlanificacion  $docentePlanificacion
     * @return \Illuminate\Http\Response
     */
    public function show(DocentePlanificacion $docentePlanificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocentePlanificacion  $docentePlanificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(DocentePlanificacion $docentePlanificacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocentePlanificacionRequest  $request
     * @param  \App\Models\DocentePlanificacion  $docentePlanificacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocentePlanificacionRequest $request, DocentePlanificacion $docentePlanificacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocentePlanificacion  $docentePlanificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocentePlanificacion $docentePlanificacion)
    {
        //
    }
}

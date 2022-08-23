<?php

namespace App\Http\Controllers;

use App\Models\Planificacion;
use App\Http\Requests\StorePlanificacionRequest;
use App\Http\Requests\UpdatePlanificacionRequest;

class PlanificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planificaciones = Planificacion::get();
        return view('planificacion.index',compact('planificaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('planificacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlanificacionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanificacionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Planificacion  $planificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Planificacion $planificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Planificacion  $planificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Planificacion $planificacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlanificacionRequest  $request
     * @param  \App\Models\Planificacion  $planificacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlanificacionRequest $request, Planificacion $planificacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Planificacion  $planificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planificacion $planificacion)
    {
        //
    }
}

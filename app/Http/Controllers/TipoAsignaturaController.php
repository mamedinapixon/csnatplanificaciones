<?php

namespace App\Http\Controllers;

use App\Models\TipoAsignatura;
use App\Http\Requests\StoreTipoAsignaturaRequest;
use App\Http\Requests\UpdateTipoAsignaturaRequest;

class TipoAsignaturaController extends Controller
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
     * @param  \App\Http\Requests\StoreTipoAsignaturaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoAsignaturaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoAsignatura  $tipoAsignatura
     * @return \Illuminate\Http\Response
     */
    public function show(TipoAsignatura $tipoAsignatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoAsignatura  $tipoAsignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoAsignatura $tipoAsignatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoAsignaturaRequest  $request
     * @param  \App\Models\TipoAsignatura  $tipoAsignatura
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoAsignaturaRequest $request, TipoAsignatura $tipoAsignatura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoAsignatura  $tipoAsignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoAsignatura $tipoAsignatura)
    {
        //
    }
}

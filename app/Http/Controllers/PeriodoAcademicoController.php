<?php

namespace App\Http\Controllers;

use App\Models\PeriodoAcademico;
use App\Http\Requests\StorePeriodoAcademicoRequest;
use App\Http\Requests\UpdatePeriodoAcademicoRequest;

class PeriodoAcademicoController extends Controller
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
     * @param  \App\Http\Requests\StorePeriodoAcademicoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeriodoAcademicoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PeriodoAcademico  $periodoAcademico
     * @return \Illuminate\Http\Response
     */
    public function show(PeriodoAcademico $periodoAcademico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PeriodoAcademico  $periodoAcademico
     * @return \Illuminate\Http\Response
     */
    public function edit(PeriodoAcademico $periodoAcademico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeriodoAcademicoRequest  $request
     * @param  \App\Models\PeriodoAcademico  $periodoAcademico
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeriodoAcademicoRequest $request, PeriodoAcademico $periodoAcademico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PeriodoAcademico  $periodoAcademico
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeriodoAcademico $periodoAcademico)
    {
        //
    }
}

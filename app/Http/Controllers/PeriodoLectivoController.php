<?php

namespace App\Http\Controllers;

use App\Models\PeriodoLectivo;
use App\Http\Requests\StorePeriodoLectivoRequest;
use App\Http\Requests\UpdatePeriodoLectivoRequest;

class PeriodoLectivoController extends Controller
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
     * @param  \App\Http\Requests\StorePeriodoLectivoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeriodoLectivoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PeriodoLectivo  $periodoLectivo
     * @return \Illuminate\Http\Response
     */
    public function show(PeriodoLectivo $periodoLectivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PeriodoLectivo  $periodoLectivo
     * @return \Illuminate\Http\Response
     */
    public function edit(PeriodoLectivo $periodoLectivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeriodoLectivoRequest  $request
     * @param  \App\Models\PeriodoLectivo  $periodoLectivo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeriodoLectivoRequest $request, PeriodoLectivo $periodoLectivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PeriodoLectivo  $periodoLectivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeriodoLectivo $periodoLectivo)
    {
        //
    }
}

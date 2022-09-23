<?php

namespace App\Http\Controllers;

use App\Models\PeriodoLectivo;
use App\Models\PeriodoAcademico;
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
        return view('admin.periodoLectivo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periodosAcademicos  = PeriodoAcademico::get();
        return view('admin.periodoLectivo.create', compact('periodosAcademicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeriodoLectivoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeriodoLectivoRequest $request)
    {
        $request = $request->all();
        $periodoLectivo = PeriodoLectivo::where('anio_academico',$request['anio_academico'])
                                        ->where('periodo_academico_id',$request['periodo_academico_id'])
                                        ->first();
        if($periodoLectivo)
        {
            //Retorno
            session()->flash('error', 'El Periodo lectivo ya existe!');
            return back()->withInput();
        }

        $periodoLectivo = PeriodoLectivo::create($request);
        //Retorno
        session()->flash('message', 'Periodo lectivo creado satisfactoriamente!');
        return view('admin.periodoLectivo.index');
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
        $periodosAcademicos = PeriodoAcademico::get();
        return view('admin.periodoLectivo.edit', compact('periodoLectivo','periodosAcademicos'));
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
        //dd($request->all());
        $periodoLectivo->update($request->all());

        //Retorno
        session()->flash('message', 'Periodo lectivo #'.$periodoLectivo->id.' actualizado satisfactoriamente!');
        return view('admin.periodoLectivo.index');
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

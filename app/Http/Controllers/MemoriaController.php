<?php

namespace App\Http\Controllers;

use App\Models\Memoria;
use App\Http\Requests\StoreMemoriaRequest;
use App\Http\Requests\UpdateMemoriaRequest;
use App\Models\MemoriaAsignatura;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MemoriaController extends Controller
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
        $anio_academico = Carbon::now()->year;
        $memoria = Memoria::where("anio_academico",$anio_academico)->where("user_id",Auth::user()->id)->first();

        if(empty($memoria))
        {
            $memoria = Memoria::create([
               "user_id" => Auth::user()->id,
               "anio_academico" => $anio_academico
            ]);
        }

        return redirect()->route('memoria.edit', $memoria);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMemoriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemoriaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Memoria  $memoria
     * @return \Illuminate\Http\Response
     */
    public function show(Memoria $memorium)
    {
        $memoria = $memorium;
        if(empty($memoria->id)) return redirect()->route('memoria.index');

        $memorias_asignaturas_estables = MemoriaAsignatura::where('memoria_id', $memoria->id)->where("tipo_docente","Estable")->get();
        $memorias_asignaturas_invitado = MemoriaAsignatura::where('memoria_id', $memoria->id)->where("tipo_docente","Invitado")->get();
        return view('memoria.show', compact('memoria','memorias_asignaturas_estables','memorias_asignaturas_invitado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Memoria  $memoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Memoria $memorium)
    {
        $memoria = $memorium;
        //TODO: Controlar cuando no existe la memoria.
        //return redirect()->route('memoria.edit', $memoria);
        if(empty($memoria->id)) return redirect()->route('memoria.index');
        return view('memoria.edit', compact('memoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMemoriaRequest  $request
     * @param  \App\Models\Memoria  $memoria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemoriaRequest $request, Memoria $memoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Memoria  $memoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memoria $memoria)
    {
        //
    }
}

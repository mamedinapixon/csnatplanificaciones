<?php

namespace App\Http\Controllers;

use App\Models\Memoria;
use App\Http\Requests\StoreMemoriaRequest;
use App\Http\Requests\UpdateMemoriaRequest;
use App\Models\MemoriaAsignatura;
use App\Models\AnioAcademico;
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
        $memoria = Memoria::get();
        //dd($planificaciones);
        return view('memoria.index',compact('memoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anio_academico = 2023; // TODO: Seleccionar desde la tabla AnioAcademico. Se lo hardcodea por el apuro que tiene que salga.
        //AnioAcademico::where('memoria_activo_hasta');//Carbon::now()->year;
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

        if($memoria->user_id == Auth::user()->id && ($memoria->estado_id == 1 || $memoria->estado_id == 4))
        {
            return redirect()->route('memoria.edit', $memoria);
        }
        if($memoria->user_id != Auth::user()->id)
        {
            if(!Auth::user()->can('ver todas memorias'))
            {
                session()->flash('message', 'No tiene permiso para ver la memoria');
                return redirect()->route('memoria.index');
            }
        }

        $memorias_asignaturas_estables = MemoriaAsignatura::with('cargo','dedicacion','situacion_cargo')->where('memoria_id', $memoria->id)->where("tipo_docente","Estable")->get();
        $memorias_asignaturas_invitado = MemoriaAsignatura::with('cargo','dedicacion','situacion_cargo')->where('memoria_id', $memoria->id)->where("tipo_docente","Invitado")->get();
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

        if(!Auth::user()->can('editar cualquier memoria'))
        {
            if($memoria->estado_id > 1 && $memoria->estado_id < 4) // Si estado es diferente a iniciado, no puede editar
            {
                return redirect()->route('memoria.show', $memoria);
            }
            if($memoria->user_id != Auth::user()->id) // Si el usuario es diferente, no puede editar.
            {
                return redirect()->route('memoria.show', $memoria);
            }
        }

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

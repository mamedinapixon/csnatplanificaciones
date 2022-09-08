<?php

namespace App\Http\Controllers;

use App\Models\Planificacion;
use App\Http\Requests\StorePlanificacionRequest;
use App\Http\Requests\UpdatePlanificacionRequest;
use Illuminate\Http\Request;
use App\Models\DocentePlanificacion;
use App\Models\Salida;

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
        //dd($planificaciones);
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
    public function store(Request $request)
    {
        //dd($request->all());
        //$pregunta = Pregunta::create($request->all());
        //Retorno
        //return back()->with('status', 'Pregunta creada con éxitos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Planificacion  $planificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Planificacion $planificacion)
    {
        /*
        $planificacion = Planificacion::with(['materiaPlanEstudio.materia','materiaPlanEstudio.carrera','docenteCargo','periodoLectivo','periodoLectivo.periodoAcademico'])->where("id",$planificacion->id)->first();
        $asigantura = $planificacion->materiaPlanEstudio->anio_curdada."º año - ".$planificacion->materiaPlanEstudio->materia->nombre;
        $carrera = $planificacion->materiaPlanEstudio->carrera->codigo_siu;
        $periodo_lectivo = $planificacion->periodoLectivo->periodoAcademico->nombre." ".$planificacion->periodoLectivo->anio_academico;
        */
        $planificacion = Planificacion::with(['materiaPlanEstudio.materia',
                                            'materiaPlanEstudio.carrera',
                                            'docenteCargo',
                                            'periodoLectivo',
                                            'periodoLectivo.periodoAcademico',
                                            'modalidadParcial'])
                                        ->where("id",$planificacion->id)
                                        ->first();
        $asigantura = $planificacion->materiaPlanEstudio->anio_curdada."º año - ".$planificacion->materiaPlanEstudio->materia->nombre;
        $carrera = $planificacion->materiaPlanEstudio->carrera->codigo_siu;
        $periodo_lectivo = $planificacion->periodoLectivo->periodoAcademico->nombre." ".$planificacion->periodoLectivo->anio_academico;
        $docentesPartipan = DocentePlanificacion::with("docente", "cargo")->where("planificacion_id",$planificacion->id)->get();
        $salidas = Salida::where("planificacion_id", $planificacion->id)->get();
        //dd($planificacion);
        //$docente = $planificacion->docenteCargo->apellido." ".$planificacion->docenteCargo->nombre;
        return view('planificacion.show', compact('planificacion','asigantura','carrera','periodo_lectivo','docentesPartipan', 'salidas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Planificacion  $planificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Planificacion $planificacion)
    {
        $planificacion = Planificacion::with(['materiaPlanEstudio.materia','materiaPlanEstudio.carrera','docenteCargo','periodoLectivo','periodoLectivo.periodoAcademico'])->where("id",$planificacion->id)->first();
        $asigantura = $planificacion->materiaPlanEstudio->anio_curdada."º año - ".$planificacion->materiaPlanEstudio->materia->nombre;
        $carrera = $planificacion->materiaPlanEstudio->carrera->codigo_siu;
        $periodo_lectivo = $planificacion->periodoLectivo->periodoAcademico->nombre." ".$planificacion->periodoLectivo->anio_academico;
        $docente = "";//$planificacion->docenteCargo->apellido." ".$planificacion->docenteCargo->nombre;
        return view('planificacion.edit', compact('planificacion','asigantura','carrera','periodo_lectivo','docente'));
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

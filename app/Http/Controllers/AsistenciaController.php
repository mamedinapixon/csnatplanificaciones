<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;

class AsistenciaController extends Controller
{
    public function index()
    {
        return view('asistencia.index');
    }

    public function historial()
    {
        return view('asistencia.historial');
    }

    public function create()
    {
        return view('asistencia.create');
    }

    public function show(Asistencia $asistencia)
    {

        return view('asistencia.show');
    }

    public function edit(Asistencia $asistencia)
    {
        return view('asistencia.edit');
    }
}

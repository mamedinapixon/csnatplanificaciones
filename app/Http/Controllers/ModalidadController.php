<?php

namespace App\Http\Controllers;

use App\Models\Modalidad;
use App\Http\Requests\StoreModalidadRequest;
use App\Http\Requests\UpdateModalidadRequest;

class ModalidadController extends Controller
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
     * @param  \App\Http\Requests\StoreModalidadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModalidadRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modalidad  $modalidad
     * @return \Illuminate\Http\Response
     */
    public function show(Modalidad $modalidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modalidad  $modalidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Modalidad $modalidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateModalidadRequest  $request
     * @param  \App\Models\Modalidad  $modalidad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModalidadRequest $request, Modalidad $modalidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modalidad  $modalidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modalidad $modalidad)
    {
        //
    }
}

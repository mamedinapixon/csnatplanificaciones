<?php

namespace App\Http\Controllers;

use App\Models\Memoria;
use App\Http\Requests\StoreMemoriaRequest;
use App\Http\Requests\UpdateMemoriaRequest;

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
        //
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
    public function show(Memoria $memoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Memoria  $memoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Memoria $memoria)
    {
        //
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

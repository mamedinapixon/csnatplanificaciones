<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Http\Requests\StoreDocenteRequest;
use App\Http\Requests\UpdateDocenteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.docente.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.docente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDocenteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocenteRequest $request)
    {
        //
        $docente = Docente::create($request->all());

        //Retorno
        session()->flash('message', 'Docente '.$docente->apellido.', '.$docente->nombre.' creado satisfactoriamente!');
        return view('admin.docente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente $docente)
    {
        //
        return view('admin.docente.edit', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocenteRequest  $request
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocenteRequest $request, Docente $docente)
    {
        //
        $docente->update($request->all());

        //Retorno
        session()->flash('message', 'Docente '.$docente->apellido.', '.$docente->nombre.' actualizado satisfactoriamente!');
        return redirect()->route('docente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        //
    }

    public function mostrarFormulario()
    {
        return view('admin.docente.importar');
    }

    public function cargarCSV(Request $request)
    {
        // Validar que se haya subido un archivo
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt'
        ]);

        // Obtener el archivo
        $file = $request->file('csv_file');

        // Abrir el archivo
        $archivo = fopen($file->getPathname(), 'r');

        // Leer la primera línea (encabezados) para saltarla
        fgetcsv($archivo);

        // Comenzar transacción de base de datos
        DB::beginTransaction();

        try {
            // Arreglo para guardar los IDs de docentes procesados
            $docentesProcesados = [];

            // Leer cada línea del CSV
            while (($linea = fgetcsv($archivo)) !== FALSE) {
                // Asumimos que el CSV tiene columnas: Apellido, Nombre
                $apellido = trim($linea[0]);
                $nombre = trim($linea[1]);

                // Buscar si el docente existe
                $docente = Docente::where('apellido', $apellido)
                    ->where('nombre', $nombre)
                    ->first();

                if ($docente) {
                    // Si existe, activarlo
                    $docente->activo = true;
                    $docente->save();
                    $docentesProcesados[] = $docente->id;
                } else {
                    // Si no existe, crear nuevo docente
                    $nuevoDocente = Docente::create([
                        'apellido' => $apellido,
                        'nombre' => $nombre,
                        'activo' => true
                    ]);
                    $docentesProcesados[] = $nuevoDocente->id;
                }
            }

            // Desactivar docentes no incluidos en el CSV
            Docente::whereNotIn('id', $docentesProcesados)
                ->update(['activo' => false]);

            // Confirmar transacción
            DB::commit();

            return redirect()->back()->with('success', 'CSV procesado exitosamente');

        } catch (\Exception $e) {
            // Revertir transacción en caso de error
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al procesar el CSV: ' . $e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clases = DB::table('clases')
            ->join('maestros', 'maestros.id', '=', 'clases.maestro_id')
            ->select(
                'clases.nombre',
                'clases.salon', 
                DB::raw('CONCAT(maestros.nombre, \' \', maestros.apellidos) as nombre_maestro'), 
                'clases.created_at',
                'clases.updated_at',
                'clases.id',
                'clases.maestro_id'
            )
            ->get();

        return $clases;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clase = Clase::create($request->all());

        return response()->json(
            [
                "message" => "Proceso realizado correctamente.",
                "data" => $clase,
                "status" => Response::HTTP_CREATED
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function show(Clase $clase)
    {
        return $clase;
        /*return response()->json(
            [
                "data" => $clase,
                "status" => Response::HTTP_OK
            ],
            Response::HTTP_OK
        );*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clase $clase)
    {
        $clase->update($request->all());

        return $clase;
        /*return response()->json(
            [
                "message" => "Proceso realizado correctamente.",
                "data" => $clase,
                "status" => Response::HTTP_OK
            ],
            Response::HTTP_OK
        );*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clase $clase)
    {
        $clase->delete();

        return response()->json(
            [
                "message" => "Proceso realizado correctamente.",
                "data" => $clase,
                "status" => Response::HTTP_OK
            ],
            Response::HTTP_OK
        );
    }
}

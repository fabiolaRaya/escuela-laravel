<?php

namespace App\Http\Controllers;

use App\Models\Maestro;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maestros = Maestro::all();

        return $maestros;

       
        /*return response()->json(
            [
                "data" => $maestros,
                "status" => Response::HTTP_OK
            ],
            Response::HTTP_OK
        );*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $maestro = Maestro::create($request->all());
        return response()->json(
            [
                "message" => "Proceso realizado correctamente.",
                "data" => $maestro,
                "status" => Response::HTTP_CREATED
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maestro  $maestro
     * @return \Illuminate\Http\Response
     */
    public function show(Maestro $maestro)
    {
        return $maestro;
        /*return response()->json(
            [
                "data" => $maestro,
                "status" => Response::HTTP_OK
            ],
            Response::HTTP_OK
        );*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maestro  $maestro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maestro $maestro)
    {
        $maestro->update($request->all());

        return response()->json(
            [
                "message" => "Proceso realizado correctamente.",
                "data" => $maestro,
                "status" => Response::HTTP_OK
            ],
            Response::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maestro  $maestro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maestro $maestro)
    {
        $maestro->delete();

        return response()->json(
            [
                "message" => "Proceso realizado correctamente.",
                "data" => $maestro,
                "status" => Response::HTTP_OK
            ],
            Response::HTTP_OK
        );
    }
}

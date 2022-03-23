<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clases = Clase::all();

        return response()->json(
            [
                "data" => $clases,
                "status" => Response::HTTP_OK
            ],
            Response::HTTP_OK
        );
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
        return response()->json(
            [
                "data" => $clase,
                "status" => Response::HTTP_OK
            ],
            Response::HTTP_OK
        );
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

        return response()->json(
            [
                "message" => "Proceso realizado correctamente.",
                "data" => $clase,
                "status" => Response::HTTP_OK
            ],
            Response::HTTP_OK
        );
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

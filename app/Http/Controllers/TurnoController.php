<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $turnos = Turno::all();
        // return view('turno.index', compact('turnos'));
        $turnos = Turno::all();
        return response()->json($turnos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('turno.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $turno = Turno::create($request->all());

        return response()->json([
            'turno' => $turno->turno,
            'estado' => $turno->estado,
        ]);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function show(Turno $turno)
    {
        //
        return response()->json($turno);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function edit(Turno $turno)
    {
        //
        //dd($turno);
        // return view('turno.update', compact('turno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turno $turno)
    {
        $turno->turno = $request->input('turno');
        $turno->estado = $request->input('estado');
        $turno->save();

        return response()->json([
            'turno' => $turno->turno,
            'estado' => $turno->estado
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turno $turno)
    {
        $turno->delete();
        return response()->json([
            'mensaje' => 'eliminado'
        ]);
    }

}

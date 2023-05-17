<?php

namespace App\Http\Controllers;

use App\Models\Pelicula_Turno;
use App\Models\Pelicula;
use App\Models\Turno;
use Illuminate\Http\Request;

class PeliculaTurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turnos_peliculas = Pelicula_Turno::all();
        $valores_tratados = [];
        foreach ($turnos_peliculas as $tp) {
            $pelicula = Pelicula::find($tp->pelicula_id);
            $turno = Turno::find($tp->turno_id);
            $aux = [
                'pelicula' => $pelicula,
                'turno' => $turno
            ];
            array_push($valores_tratados, $aux);
        }
        return view('peliculaTurno.index', compact('valores_tratados'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Pelicula $pelicula
     * @return \Illuminate\Http\Response
     */
    public function pelicula(Pelicula $pelicula)
    {
        $turnos_pelicula = Pelicula_Turno::where('pelicula_id', $pelicula->id)->get();
        $valores_tratados = [];
        foreach ($turnos_pelicula as $tp) {
            $pelicula = Pelicula::find($tp->pelicula_id);
            $turno = Turno::find($tp->turno_id);
            $aux = [
                'pelicula' => $pelicula,
                'turno' => $turno
            ];
            array_push($valores_tratados, $aux);
        }
        return view('peliculaTurno.pelicula', compact('valores_tratados', 'pelicula'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Pelicula $pelicula
     * @return \Illuminate\Http\Response
     */
    public function crear(Pelicula $pelicula)
    {
        $turnos = Turno::all();
        $turnos_pelicula = Pelicula_Turno::where('pelicula_id', $pelicula->id)->get();
        $turno_id_reales = [];
        foreach ($turnos_pelicula as $tp) {
            $idT = $tp->turno_id;
            array_push($turno_id_reales, $idT);
        }

        $turno_mostrar = [];
        foreach ($turnos as $val) {
            if (!in_array($val->id, $turno_id_reales)) {
                array_push($turno_mostrar, $val);
            }
        }
        return view('peliculaTurno.crear', compact('turno_mostrar', 'pelicula'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     public function guardar(Request $request)
     {
         $pt = new Pelicula_Turno();
         $pelicula_id = $request->input('pelicula');
         $pelicula = Pelicula::find($pelicula_id);
 
         $pt->pelicula_id = $request->input('pelicula');
         $pt->turno_id = $request->input('turno');
         $pt->save();
 
         $turnos_pe = Pelicula_Turno::where('pelicula_id', $pelicula_id)->get();
         $estados = [];
 
         foreach ($turnos_pe as $tpe) {
             $turno = Turno::find($tpe->turno_id);
             $estado = $turno->estado;
             array_push($estados, $estado);
         }
 
         if (in_array(1, $estados)) {
             return redirect()->route('pelicula_turno.pelicula', ['pelicula' => $pelicula]);
         }
 
         return redirect()->route('pelicula_turno.pelicula', ['pelicula' => $pelicula])->with('success', 'Turno agregado exitosamente.');
     
 



        }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelicula $pelicula
     * @return \Illuminate\Http\Response
     */
    public function cambios(Pelicula $pelicula)
    {
        return view('peliculaTurno.salto', compact('pelicula'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelicula_Turno $pelicula_turno)
    {
        $pelicula_turno->delete();
        return redirect()->route('pelicula_turno.index');
    }
}

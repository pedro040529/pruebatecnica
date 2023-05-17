<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $orderColumn = $request->query('order') ?? 'id';
        // $orderDirection = $request->query('direction') ?? 'asc';

        // $peliculas = Pelicula::orderBy($orderColumn, $orderDirection)->get();

        // return view('pelicula.index', compact('peliculas', 'orderColumn', 'orderDirection'));

        $peliculas = Pelicula::all();
        return response()->json($peliculas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('pelicula.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pelicula = Pelicula::create($request->all());

        return response()->json([
            'nombre' => $pelicula->nombre,
            'fecha_publicacion' => $pelicula->fecha_publicacion,
            'imagen' => $pelicula->imagen,
        ]);
    

    // $nombre = $request->input('nombre');
    // $fecha_publicacion = $request->input('fecha_publicacion');
    // $imagen = $request->file('imagen');
    // // $estado = $request->has('estado') && $request->boolean('estado');

    // $nombre_imagen = time() . '_' . $imagen->getClientOriginalName();
    // $imagen->move(public_path('images'), $nombre_imagen);

    // $pelicula = new Pelicula();
    // $pelicula->nombre = $nombre;
    // $pelicula->fecha_publicacion = $fecha_publicacion;
    // $pelicula->imagen = $nombre_imagen;
    // $pelicula->save();

    // return redirect()->route('pelicula.index')->with('success', 'La película se ha creado correctamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show(Pelicula $pelicula)
    {
        //
        return response()->json($pelicula);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelicula $pelicula)
    {
        // return view('pelicula.update', compact('pelicula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelicula $pelicula)
    {

    if ($request->hasFile('imagen')) {

        if ($pelicula->imagen) {
            Storage::delete($pelicula->imagen);
        }

        $imagenPath = $request->file('imagen')->store('ruta/de/guardado');
        $pelicula->imagen = $imagenPath;
    }

    $pelicula->fill($request->only(['nombre', 'fecha_publicacion']));
    $pelicula->save();

    return response()->json([
        'nombre' => $pelicula->nombre,
        'fecha_publicacion' => $pelicula->fecha_publicacion,
        'imagen' => $pelicula->imagen
    ]);






        // $pelicula->nombre = $request->input('nombre');
        // $pelicula->fecha_publicacion = $request->input('fecha_publicacion');
        
        // if ($request->hasFile('imagen')) {
        //     Storage::delete(public_path('images/'.$pelicula->imagen));
            
        //     $nombre_imagen = time() . '_' . $request->file('imagen')->getClientOriginalName();
        //     $request->file('imagen')->move(public_path('images'), $nombre_imagen);
        //     $pelicula->imagen = $nombre_imagen;
        // }
        
        // $pelicula->save();
        
        // return redirect()->route('pelicula.index')->with('success', 'Película actualizada exitosamente.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function estado(Request $request, Pelicula $pelicula)
    {
        // $pelicula->estado = 1;
        
        // $pelicula->save();
        
        // return redirect()->route('pelicula_turno.pelicula', ['pelicula' => $pelicula->id])->with('success', 'Turno agregado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelicula $pelicula)
    {
        // $pelicula->turnos()->detach();
        // $pelicula->delete();
        // return redirect()->route('pelicula.index');

        $pelicula->delete();
        return response()->json([
            'mensaje' => 'eliminado'
        ]);
    }
}

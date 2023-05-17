@extends('Tema.head')
@section('content')
<div class="container my-5">
    <h1 class="mb-4">Películas</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
    
    <div class="float-end mb-3">
        <a href="{{ route('pelicula.create') }}" class="btn btn-primary">Crear Película</a>
    </div>
    

    <table class="table" >
        <thead>
            <tr>
                <th scope="col"><a href="?order=id&amp;direction={{ $orderDirection == 'asc' ? 'desc' : 'asc' }}">Id </a></th>
                <th scope="col"><a href="?order=nombre&amp;direction={{ $orderDirection == 'asc' ? 'desc' : 'asc' }}">Nombre</a></th>
                <th scope="col"><a href="?order=fecha_publicacion&amp;direction={{ $orderDirection == 'asc' ? 'desc' : 'asc' }}">Fecha de publicación</a></th>
                <th scope="col"><a href="?order=estado&amp;direction={{ $orderDirection == 'asc' ? 'desc' : 'asc' }}">Estado</a></th>
                
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($peliculas as $pelicula)
                <tr>
                    <td scope="row">{{ $pelicula->id }}</td>
                    <td>{{ $pelicula->nombre }}</td>
                    <td>{{ $pelicula->fecha_publicacion }}</td>
                    <td>{{ $pelicula->estados() }}</td>
                    <td><a href="{{ route('pelicula.edit', $pelicula) }}"><i class="fas fa-pencil-alt"></i></a></td>
                    <td><a href="{{ route('pelicula_turno.pelicula', $pelicula) }}"><i class="fas fa-bars"></i></a></td>
                    <td>
                        @if ($pelicula->estado === 1)
                            <i class="fas fa-lock"></i>
                        @else
                            <i class="fas fa-lock-open"></i>
                        @endif
                    </td>

                    <td>
                        <form action="{{ route('pelicula.destroy', $pelicula->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
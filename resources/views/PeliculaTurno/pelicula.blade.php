@extends('Tema.head')
@section('content')
<div class="container my-5">
    <h1 class="mb-4">Lista de Asignaciones</h1>
    <div class="float-end mb-3">
    <a href="{{ route('pelicula_turno.crear', $pelicula) }}" class="btn btn-primary">Asignar turno</a>
    
</div>
<h1>Pelicula: {{ $pelicula->nombre}}</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Turno</th>
            <th scope="col">Estado</th>
            
            
        </tr>
    </thead>
    <tbody>
        @foreach($valores_tratados as $vt)
            <tr>
                <td scope="row">{{ $vt["turno"]->id }}</td>
                <td>{{ $vt["turno"]->turno }}</td>
                <td>
                    @if ($vt["turno"]->estado === 1)
                        Activo
                    @else
                        Inactivo
                    @endif
                </td>
                <td>
                    @if ($vt["turno"]->estado === 1)
                        <i class="fas fa-lock"></i>
                    @else
                        <i class="fas fa-lock-open"></i>
                    @endif
                </td>

                <td class="text-right pr-4">
                    <form action="{{ route('pelicula_turno.destroy', $pelicula->id) }}" method="POST">
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
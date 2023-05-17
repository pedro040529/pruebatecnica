@extends('Tema.head')

@section('content')

<h1>Asignar turnos</h1>

<form action="{{ route('pelicula_turno.guardar') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <input type="hidden" id="peliculaId" name="pelicula" value="{{ $pelicula->id }}">

        <label for="inputTurno">Seleccione un turno:</label>
        <select class="form-control mb-3" name="turno" id="inputTurno">
            <option selected>Seleccione un turno</option>
            @foreach($turno_mostrar as $tm)
                <option value="{{ $tm->id }}">
                    {{ $tm->turno }} -
                    @if ($tm->estado === 1)
                        Activo
                    @else
                        Inactivo
                    @endif    
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>

</form>

@endsection

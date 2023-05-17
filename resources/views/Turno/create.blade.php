@extends('Tema.head')
@section('content')
<h1>
    Turnos
</h1>
<form action="{{ route('turno.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="">
        <div class="">
            <label for="inputTurno">Turno</label>
            <input type="time" name="turno" id="inputTurno">
        </div>
        <div class="">
            <div class="form-check">
                <input type="checkbox" name="estado" id="estado" value="1"> Se encuentra activo?
            </div>
        </div>
        <button type="submit">Guardar</button>
    </div>
</form>
@endsection
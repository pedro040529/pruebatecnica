@extends('Tema.head')
@section('content')
<h1>
    Registrar tarea
</h1>
<form action="{{ route('turno.update', $turno->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="turno">Turno:</label>
        <input type="time" class="form-control" id="turno" name="turno" value="{{ $turno->turno }}">
    </div>
    <!-- <div class="form-group">
        <label for="estado">Estado:</label>
        <input type="text" class="form-control" id="estado" name="estado" value="{{ $turno->estado }}">
    </div> -->
    <div class="">
            <div class="form-check">
                <input type="checkbox" name="estado" id="estado" value="{{ $turno->estado }}" {{ $turno->estado == 0 ? '' : 'checked' }}> Se encuentra activo?
            </div>
        </div>
    <button type="submit" class="btn btn-primary">Guardar cambios</button>
</form>
@endsection
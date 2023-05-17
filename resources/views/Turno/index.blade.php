@extends('Tema.head')
@section('content')
<h1>
    Turnos
</h1>
        
<table class="table">
    <thead>
        <div class="float-end mb-3">
            <a href="{{ route('turno.create') }}" class="btn btn-primary">Crear Turnos</a>
        </div>
        
        <tr>
            <th scope="col">id</th>
            <th scope="col">Turno</th>
            <th scope="col">Estado</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($turnos as $turno)
            <tr>
                <td scope="row">{{ $turno->id }}</td>
                <td>{{ $turno->turno }}</td>
                <td>{{ $turno->estadosT()}}</td>
                <td><a href="{{ route('turno.edit', $turno) }}"><i class="fas fa-pencil-alt"></i></a></td>
                <td> 
                    <form action="{{ route('turno.destroy', $turno->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
<h1>
    Bievenido
</h1>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Pelicula</th>
            <th>Turno</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($valores_tratados as $vt)
            <tr>
                <td>{{ $vt["turno"]->id }}</td>
                <td>{{ $vt["pelicula"]->nombre }}</td>
                <td>{{ $vt["turno"]->turno }}</td>
                <td>
                    @if ($vt["turno"]->estado === 1)
                        Activo
                    @else
                        Inactivo
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
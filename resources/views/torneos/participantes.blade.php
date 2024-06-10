@extends('main')
@include('header')

@section('title', 'Detalles Torneo')

@section('content')

    <h1>Participantes de {{$torneo->nombre}}</h1>
    <hr>

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('error') }}
        </div>
        <br/>
    @endif

    <form action="{{ route('torneos.addTenista', $torneo->id) }}" method="POST">
        @csrf
        <label for="tenista_id">Añadir Tenista:</label>
        <select name="tenista_id" id="tenista_id" multiple>
            @foreach($allTenistas as $tenista)
                <option value="{{ $tenista->id }}">{{ $tenista->nombre_completo }}</option>
            @endforeach
        </select>
        <button type="submit">Añadir</button>
    </form>

    @if (count($tenistas) > 0)
        <table class="table">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>País</th>
                <th>Edad</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($tenistas as $tenista)
                <tr>
                    <td>{{ $tenista->nombre_completo }}</td>
                    <td>{{ $tenista->pais }}</td>
                    <td>{{ $tenista->edad }}</td>
                    <td>
                        <form action="{{ route('torneos.removeTenista', $torneo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="tenista_id" value="{{ $tenista->id }}">
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    @else
        <p class='lead'><em>No hay ningún tenista en este torneo.</em></p>
    @endif

@endsection
@include('footer')

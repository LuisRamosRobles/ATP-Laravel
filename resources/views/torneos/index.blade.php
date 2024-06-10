@php use App\Models\Torneo; @endphp

@extends('main')
@include('header')

@section('title', 'Listado de Torneos')

@section('content')


        <h1>Listado de Torneos</h1>

        <form action="{{ route('torneos.index') }}" class="mb-3" method="get">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control" id="search" name="search" placeholder="Nombre del Torneo o ubicación">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </div>
        </form>


        @if (count($torneos) > 0)
            <div class="row">
                @foreach ($torneos as $torneo)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                @if($torneo->imagen != Torneo::$IMAGE_DEFAULT)
                                    <img alt="Imagen del Torneo" class="img-fluid"
                                         src="{{ asset('storage/' . $torneo->imagen) }}"
                                         width="150px" height="150px">
                                @else
                                    <img alt="Imagen por defecto" class="img-fluid"
                                         src="{{ Torneo::$IMAGE_DEFAULT }}">
                                @endif
                                <h5 class="card-title">{{ $torneo->nombre }}</h5>
                                <p class="card-text">
                                    <strong>Ubicación:</strong> {{ $torneo->ubicacion }}<br>
                                    <strong>Fecha:</strong> {{ $torneo->fecha }}<br>
                                    <strong>Tipo de Torneo:</strong> {{ $torneo->tipo_torneo }}<br>
                                    <strong>Categoria:</strong> {{ $torneo->categoria }}<br>
                                    <strong>Superficie:</strong> {{ $torneo->superficie }}<br>
                                    <strong>Premio:</strong> {{ $torneo->premio }}<br>
                                </p>
                                <a href="{{ route('torneos.show', $torneo->id) }}" class="btn btn-primary btn-sm">Detalles</a>
                                <a href="{{ route('torneos.edit', $torneo->id) }}" class="btn btn-secondary btn-sm">Editar</a>
                                <form action="{{ route('torneos.destroy', $torneo->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas borrar este torneo?')">Borrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class='lead'><em>No se ha encontrado datos de torneos.</em></p>
        @endif

        <div class="pagination-container">
            {{ $torneos->links('pagination::bootstrap-4') }}
        </div>


    <a class="btn btn-success mb-3" href={{ route('torneos.create') }}>Nuevo Producto</a>





@endsection
@include('footer')

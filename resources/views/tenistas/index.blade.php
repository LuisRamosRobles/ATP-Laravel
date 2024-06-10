@php use App\Models\Tenista; @endphp

@extends('main')
@include('header')

@section('title', 'Listado de Tenistas')


@section('content')

    <div class="tenistas">
        <h1>Listado de Tenistas</h1>

        <form action="{{ route('tenistas.index') }}" class="mb-3" method="get">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control" id="search" name="search" placeholder="Nombre del Tenista">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </div>
            </div>
        </form>

        @if (count($tenistas) > 0)
            <div class="row">
                @foreach ($tenistas as $tenista)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                @if($tenista->imagen != Tenista::$IMAGE_DEFAULT)
                                    <img alt="Imagen del Tenista" class="img-fluid"
                                         src="{{ asset('storage/' . $tenista->imagen) }}"
                                         width="150px" height="150px">
                                @else
                                    <img alt="Imagen por defecto" class="img-fluid"
                                         src="{{ Tenista::$IMAGE_DEFAULT }}">
                                @endif
                                <h5 class="card-title">{{ $tenista->nombre_completo }}</h5>
                                <p class="card-text">
                                    <strong>Ranking:</strong> {{ $tenista->ranking }}<br>
                                    <strong>Best Ranking:</strong> {{ $tenista->bestRanking }}<br>
                                    <strong>País:</strong> {{ $tenista->pais }}<br>
                                    <strong>Edad:</strong> {{ $tenista->edad }}<br>
                                    <strong>Profesional desde:</strong> {{ $tenista->profesional_desde }}<br>
                                    <strong>Win rate:</strong> {{ $tenista->win_rate }}<br>
                                    <strong>Puntos:</strong> {{ $tenista->puntos }}
                                </p>
                                <a href="{{ route('tenistas.show', $tenista->id) }}" class="btn btn-primary btn-sm">Detalles</a>
                                <a href="{{ route('tenistas.edit', $tenista->id) }}" class="btn btn-secondary btn-sm">Editar</a>
                                <form action="{{ route('tenistas.destroy', $tenista->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas borrar este tenista?')">Borrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class='lead'><em>No se ha encontrado datos de tenistas.</em></p>
        @endif

        <div class="pagination-container">
            {{ $tenistas->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <a class="btn btn-success mb-5" href={{ route('tenistas.create') }}>Nuevo Producto</a>




@endsection
@include('footer')

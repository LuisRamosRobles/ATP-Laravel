@php use App\Models\Torneo; @endphp

@extends('main')
@include('header')

@section('title', 'Detalles Torneo')

@section('content')

    <h1>{{ $torneo->nombre }}</h1>
    <dl class="row">
        <dt class="col-sm-2">Nombre:</dt>
        <dd class="col-sm-10">{{ $torneo->nombre }}</dd>
        <dt class="col-sm-2">Ubicación:</dt>
        <dd class="col-sm-10">{{ $torneo->ubicacion}}</dd>
        <dt class="col-sm-2">Tipo de Torneo:</dt>
        <dd class="col-sm-10">{{ $torneo->tipo_torneo }}</dd>
        <dt class="col-sm-2">Categoria:</dt>
        <dd class="col-sm-10">{{ $torneo->categoria }}</dd>
        <dt class="col-sm-2">Superficie:</dt>
        <dd class="col-sm-10">{{ $torneo->superficie }}</dd>
        <dt class="col-sm-2">Entradas:</dt>
        <dd class="col-sm-10">{{ $torneo->entradas }}</dd>
        <dt class="col-sm-2">Fecha Inicio:</dt>
        <dd class="col-sm-10">{{ $torneo->fecha_ini }}</dd>
        <dt class="col-sm-2">Fecha Fin:</dt>
        <dd class="col-sm-10">{{ $torneo->fecha_fin }}</dd>
        <dt class="col-sm-2">Premio:</dt>
        <dd class="col-sm-10">{{ $torneo->premio }}</dd>
        <dt class="col-sm-2">Imagen:</dt>
        <dd class="col-sm-10">
            @if($torneo->imagen != Torneo::$IMAGE_DEFAULT)
                <img alt="Imagen del Torneo" class="img-fluid" src="{{ asset('storage/' . $torneo->imagen) }}">
            @else
                <img alt="Imagen por defecto" class="img-fluid" src="{{ Torneo::$IMAGE_DEFAULT }}">
            @endif
        </dd>
    </dl>


    <a class="btn btn-primary mb-3" href="{{ route('torneos.index') }}">Volver</a>
    <a class="btn btn-info mb-3" href="{{ route('torneos.participantes', $torneo->id) }}">Participantes</a>

@endsection
@include('footer')

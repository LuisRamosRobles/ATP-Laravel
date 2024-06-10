@php use App\Models\Tenista; @endphp

@extends('main')
@include('header')

@section('title', 'Detalles Tenista')

@section('content')


    <h1>{{$tenista->nombre_completo}}</h1>
    <dl class="row">
        <dt class="col-sm-2">Ranking:</dt>
        <dd class="col-sm-10">{{ $tenista->ranking }}</dd>
        <dt class="col-sm-2">Best Ranking:</dt>
        <dd class="col-sm-10">{{ $tenista->bestRanking}}</dd>
        <dt class="col-sm-2">Nombre Completo:</dt>
        <dd class="col-sm-10">{{ $tenista->nombre_completo }}</dd>
        <dt class="col-sm-2">País:</dt>
        <dd class="col-sm-10">{{ $tenista->pais }}</dd>
        <dt class="col-sm-2">Fecha Nacimiento:</dt>
        <dd class="col-sm-10">{{ $tenista->fecha_nacimiento }}</dd>
        <dt class="col-sm-2">Edad:</dt>
        <dd class="col-sm-10">{{ $tenista->edad }} años</dd>
        <dt class="col-sm-2">Altura:</dt>
        <dd class="col-sm-10">{{ $tenista->altura }} m</dd>
        <dt class="col-sm-2">Peso:</dt>
        <dd class="col-sm-10">{{ $tenista->peso }} kg</dd>
        <dt class="col-sm-2">Profesional desde:</dt>
        <dd class="col-sm-10">{{ $tenista->profesional_desde }}</dd>
        <dt class="col-sm-2">Mano Preferida:</dt>
        <dd class="col-sm-10">{{ $tenista->mano_pref }}</dd>
        <dt class="col-sm-2">Reves:</dt>
        <dd class="col-sm-10">{{ $tenista->reves }}</dd>
        <dt class="col-sm-2">Entrenador:</dt>
        <dd class="col-sm-10">{{ $tenista->entrenador }}</dd>
        <dt class="col-sm-2">Price Money:</dt>
        <dd class="col-sm-10">{{ $tenista->price_money }}</dd>
        <dt class="col-sm-2">Win:</dt>
        <dd class="col-sm-10">{{ $tenista->win }}</dd>
        <dt class="col-sm-2">Lost:</dt>
        <dd class="col-sm-10">{{ $tenista->lost }}</dd>
        <dt class="col-sm-2">Win Rate:</dt>
        <dd class="col-sm-10">{{ $tenista->win_rate }}</dd>
        <dt class="col-sm-2">Puntos:</dt>
        <dd class="col-sm-10">{{ $tenista->puntos }}</dd>
        <dt class="col-sm-2">Imagen:</dt>
        <dd class="col-sm-10">
            @if($tenista->imagen != Tenista::$IMAGE_DEFAULT)
                <img alt="Imagen del Tenista" class="img-fluid" src="{{ asset('storage/' . $tenista->imagen) }}">
            @else
                <img alt="Imagen por defecto" class="img-fluid" src="{{ Tenista::$IMAGE_DEFAULT }}">
            @endif
        </dd>
    </dl>


    <a class="btn btn-primary mb-3" href="{{ route('tenistas.index') }}">Volver</a>
    @auth
        <a class="btn btn-secondary mb-3" href="{{ route('generar.pdf', $tenista->id)}}">Generar PDF</a>
    @endauth

@endsection
@include('footer')

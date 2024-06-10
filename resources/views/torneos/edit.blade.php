@php use App\Models\Torneo; @endphp
@extends('main')
@include('header')

@section('title', 'Editar Torneos')

@section('content')

    <h1>Editar Torneo</h1>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br/>
    @endif

    <form action="{{ route('torneos.update', $torneo->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input class="form-control" id="nombre" name="nombre" type="text" required
                   value="{{$torneo->nombre}}">
        </div>
        <div class="form-group">
            <label for="ubicacion">Ubicación:</label>
            <input class="form-control" id="ubicacion" name="ubicacion" type="text" required
                   value="{{$torneo->ubicacion}}">
        </div>
        <div class="form-group">
            <label for="tipo_torneo">Tipo de Torneo:</label>
            <select class="form-control" id="tipo_torneo" name="tipo_torneo" required>
                <option @if($torneo->tipo_torneo == 'INDIVIDUAL_DOBLES')selected @endif value="INDIVIDUAL_DOBLES">
                    Individual/Dobles</option>
                <option @if($torneo->tipo_torneo == 'INDIVIDUAL')selected @endif value="INDIVIDUAL">
                    Individual</option>
                <option @if($torneo->tipo_torneo == 'DOBLES')selected @endif value="DOBLES">
                    Dobles</option>
            </select>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select class="form-control" id="categoria" name="categoria" required>
                <option @if($torneo->categoria == 'MASTERS_1000')selected @endif value="MASTERS_1000">
                    Masters 1000</option>
                <option @if($torneo->categoria == 'MASTERS_500')selected @endif value="MASTERS_500">
                    Masters 500</option>
                <option @if($torneo->categoria == 'MASTERS_250')selected @endif value="MASTERS_250">
                    Masters 250</option>
            </select>
        </div>
        <div class="form-group">
            <label for="superficie">Superficie:</label>
            <select class="form-control" id="superficie" name="superficie" required>
                <option @if($torneo->superficie == 'PISTA_DURA')selected @endif value="PISTA_DURA">
                    Pista Dura</option>
                <option @if($torneo->superficie == 'HIERBA')selected @endif value="HIERBA">
                    Hierba</option>
                <option @if($torneo->superficie == 'TIERRA_BATIDA')selected @endif value="TIERRA_BATIDA">
                    Tierra Batida</option>
            </select>
        </div>
        <div class="form-group">
            <label for="entradas">Entradas:</label>
            <input class="form-control" id="entradas" min="0" name="entradas" type="number" required
                   value="{{$torneo->entradas}}">
        </div>
        <div class="form-group">
            <label for="fecha_ini">Fecha Inicio:</label>
            <input class="form-control" type="text" id="fecha_ini" name="fecha_ini" required
                   value="{{$torneo->fecha_ini}}">
        </div>
        <div class="form-group">
            <label for="fecha_fin">Profesional desde:</label>
            <input class="form-control" type="text" id="fecha_fin" name="fecha_fin" required
                   value="{{$torneo->fecha_fin}}">
        </div>
        <div class="form-group">
            <label for="premio">Premio:</label>
            <input class="form-control" id="premio" min="0.0" name="premio" step="0.01" type="number" required
                   value="{{$torneo->premio}}">
        </div>
        <div class="form-group">
            <label for="imagen">Imagen:</label>
            @if($torneo->imagen != Torneo::$IMAGE_DEFAULT)
                <img alt="Imagen del Torneo" class="img-fluid" src="{{ asset('storage/' . $torneo->imagen) }}">
            @else
                <img alt="Imagen por defecto" class="img-fluid" src="{{ Torneo::$IMAGE_DEFAULT }}">
            @endif
            <br>
            <br>
            <input accept="image/*" class="form-control-file" id="imagen" name="imagen" type="file">
            <small class="text-danger"></small>
        </div>



        <button class="btn btn-primary" type="submit">Actualizar</button>
        <a class="btn btn-secondary mx-2" href="{{ route('torneos.index') }}">Volver</a>
    </form>

@endsection
@include('footer')

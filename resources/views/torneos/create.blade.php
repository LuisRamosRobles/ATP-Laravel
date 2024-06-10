@extends('main')
@include('header')

@section('title', 'Crear Torneo')

@section('content')

    <h1>Crear Torneo</h1>

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

    <form action="{{ route("torneos.store") }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input class="form-control" id="nombre" name="nombre" type="text" required>
        </div>
        <div class="form-group">
            <label for="ubicacion">Ubicación:</label>
            <input class="form-control" id="ubicacion" name="ubicacion" type="text" required>
        </div>
        <div class="form-group">
            <label for="tipo_torneo">Tipo de Torneo:</label>
            <select class="form-control" id="tipo_torneo" name="tipo_torneo" required>
                <option value="INDIVIDUAL_DOBLES">
                    Individual/Dobles</option>
                <option value="INDIVIDUAL">
                    Individual</option>
                <option value="DOBLES">
                    Dobles</option>
            </select>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select class="form-control" id="categoria" name="categoria" required>
                <option value="MASTERS_1000">
                    Masters 1000</option>
                <option value="MASTERS_500">
                    Masters 500</option>
                <option value="MASTERS_250">
                    Masters 250</option>
            </select>
        </div>
        <div class="form-group">
            <label for="superficie">Superficie:</label>
            <select class="form-control" id="superficie" name="superficie" required>
                <option value="PISTA_DURA">
                    Pista Dura</option>
                <option value="HIERBA">
                    Hierba</option>
                <option value="TIERRA_BATIDA">
                    Tierra Batida</option>
            </select>
        </div>
        <div class="form-group">
            <label for="entradas">Entradas:</label>
            <input class="form-control" id="entradas" min="0" name="entradas" type="number" required>
        </div>
        <div class="form-group">
            <label for="fecha_ini">Fecha Inicio:</label>
            <input class="form-control" type="text" id="fecha_ini" name="fecha_ini" required
                   placeholder="00-00-0000">
        </div>
        <div class="form-group">
            <label for="fecha_fin">Profesional desde:</label>
            <input class="form-control" type="text" id="fecha_fin" name="fecha_fin" required
                   placeholder="00-00-0000">
        </div>
        <div class="form-group">
            <label for="premio">Premio:</label>
            <input class="form-control" id="premio" min="0.0" name="premio" step="0.01" type="number" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input accept="image/*" class="form-control-file" id="imagen" name="imagen" type="file">
            <small class="text-danger"></small>
        </div>

        <button class="btn btn-primary" type="submit">Crear</button>
        <a class="btn btn-secondary mx-2" href="{{ route('torneos.index') }}">Volver</a>
    </form>

@endsection
@include('footer')

@extends('main')
@include('header')

@section('title', 'Crear Tenista')

@section('content')
    <h1>Crear Tenista</h1>


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

    <form action="{{ route("tenistas.store") }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="nombre_completo">Nombre Completo:</label>
            <input class="form-control" id="nombre_completo" name="nombre_completo" type="text" required>
        </div>
        <div class="form-group">
            <label for="pais">País:</label>
            <input class="form-control" id="pais" name="pais" type="text" required>
        </div>
        <div class="form-group">
            <label for="fecha_nacimiento">Fecha Nacimiento:</label>
            <input class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" type="text" required
                   placeholder="00-00-0000">
        </div>
        <div class="form-group">
            <label for="altura">Altura:</label>
            <input class="form-control" id="altura" min="0.0" name="altura" step="0.01" type="number" required>
        </div>
        <div class="form-group">
            <label for="peso">Peso:</label>
            <input class="form-control" id="peso" min="0.0" name="peso" step="0.01" type="number" required>
        </div>
        <div class="form-group">
            <label for="profesional_desde">Profesional desde:</label>
            <input class="form-control" type="text" id="profesional_desde" name="profesional_desde" required
                   placeholder="00-00-0000">
        </div>
        <div class="form-group">
            <label for="mano_pref">Mano:</label>
            <select class="form-control" id="mano_pref" name="mano_pref" required>
                <option value="DIESTRO">Diestro</option>
                <option value="ZURDO">Zurdo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="reves">Reves:</label>
            <select class="form-control" id="reves" name="reves" required>
                <option value="UNA">Una</option>
                <option value="DOS">Dos</option>
            </select>
        </div>
        <div class="form-group">
            <label for="entrenador">Entrenador:</label>
            <input class="form-control" id="entrenador" name="entrenador" type="text" required>
        </div>
        <div class="form-group">
            <label for="price_money">Price Money:</label>
            <input class="form-control" id="price_money" min="0.0" name="price_money" step="0.01"
                   type="number" required>
        </div>
        <div class="form-group">
            <label for="win">Win:</label>
            <input class="form-control" id="win" min="0" name="win" type="number" required>
        </div>
        <div class="form-group">
            <label for="lost">Lost:</label>
            <input class="form-control" id="lost" min="0" name="lost" type="number" required>
        </div>
        <div class="form-group">
            <label for="puntos">Puntos:</label>
            <input class="form-control" id="puntos" min="0" name="puntos" type="number" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input accept="image/*" class="form-control-file" id="imagen" name="imagen" type="file">
            <small class="text-danger"></small>
        </div>

        <button class="btn btn-primary" type="submit">Crear</button>
        <a class="btn btn-secondary mx-2" href="{{ route('tenistas.index') }}">Volver</a>
    </form>

@endsection
@include('footer')

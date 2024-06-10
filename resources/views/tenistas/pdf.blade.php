@php use App\Models\Tenista; @endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>PDF de Tenista</title>
    <style>
        body{
            font-family: Helvetica, sans-serif;
        }
    </style>
</head>
<body>


    <div class="container">
        <h1>Detalles de {{ $tenista->nombre_completo }}</h1>
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
            <dd class="col-sm-10">{{ $tenista->altura }}m</dd>
            <dt class="col-sm-2">Peso:</dt>
            <dd class="col-sm-10">{{ $tenista->peso }}kg</dd>
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
                    <img alt="" class="img-fluid" src="{{ asset('storage/' . $tenista->imagen) }}">
                @else
                    <img alt="Imagen por defecto" class="img-fluid" src="{{ Tenista::$IMAGE_DEFAULT }}">
                @endif
            </dd>
        </dl>
    </div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
</body>
</html>

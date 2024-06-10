<!-- resources/views/emails/bienvenida.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #dddddd;
        }
        .content {
            margin-bottom: 20px;
        }
        .image {
            text-align: center;
            margin-top: 20px;
        }
        .image img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <h1>¡Bienvenido, {{ $user->name }}!</h1>
        <p>Estamos encantados de tenerte con nosotros.
            Esperamos que disfrutes de nuestra plataforma y saques el máximo provecho de nuestros servicios.</p>
        <p>Si tienes alguna pregunta, no dudes en ponerte en contacto con nuestro equipo de soporte.</p>
    </div>
    <div class="image">
        <img src="{{asset('img/logoatp.png')}}" alt="Bienvenido" width="150px">
    </div>
</div>
</body>
</html>

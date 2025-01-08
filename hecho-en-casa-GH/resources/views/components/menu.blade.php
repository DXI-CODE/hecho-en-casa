<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}"> <!-- Ruta absoluta -->
    <title>Document</title>
</head>
<header>
    <div class="menu">
        <nav>
            <ul class="menu-izquierdo">


                <li><a href="{{route('inicio.get')}}">Inicio</a></li>
                <li><a href="{{route('calendario.get') }}">Calendario</a></li>
                <li><a href="{{route('fijo.catalogo.get')}}">Catálogo</a></li>

            </ul>

            <!-- Logo directamente en el menú -->
            <img class="logo" src="{{ asset('img/logo.png') }}" alt="Logo"> <!-- Ruta absoluta -->

            <ul class="menu-derecho">
                <li><a href="#">Conócenos</a></li>
                        <li><a href="#">Buscar pedido</a></li>
                        <li class="dropdown">
                            <a href="#" id="usuario-icon">
                                 <img src="{{ asset('img/usuario.png') }}" alt="Usuario">
                            </a>
                             <div class="dropdown-menu" id="menu-usuario">
                                <button onclick="window.location.href='{{route('login.get')}}'">Iniciar sesion</button>
                                <button onclick="window.location.href='{{route('registrar.get')}}'">Registrarme</button>

                             </div>
                        </li> 
            </ul>
        </nav>
    </div>
</header>
<body>
</body>


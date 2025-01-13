<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/menuCatalogoFijo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/catalogoFijo.css') }}">
    <title>Pay de Plátano</title>
</head>
<body>
    <x-menu />
    
    <div class="layout">
        <!-- Incluir el menú -->
        <x-menu-catalogo />

        <!-- Contenido principal -->
        <main class="contenido-principal">
            <div class="title">PAYS</div>

            <div class="main-container">
                <h2>Plátano</h2>
                <img src="{{ asset('img/pay.png') }}" alt="Pay de plátano">
                <div class="outer-circle">
                    <div class="price-circle">
                        <span>12 px:</span>
                        <span>$650</span>
                    </div>
                </div>
            </div>

            <div class="description-container">
                <span>Base galleta de vainilla, capas de plátano con dulce de leche, queso crema, nuez y más dulce de leche</span>
                <img src="{{ asset('img/bolsa.png') }}" alt="Bolsa de compras">
            </div>
        </main>
    </div>
</body>
<x-pie />


</html>
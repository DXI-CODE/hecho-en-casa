<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Domicilio</title>
</head>
<body>
    <h1>Detalles de domicilio</h1>

    <form method="POST" action="{{ route('personalizado.direccion.post') }}">
        @csrf
        <select name="tipo_domicilio" id="domicilio">
            <option value="Default">Domicilio por defecto</option>
            <option value="Nueva">Nueva ubicación</option>
        </select>

        <button type="submit">Siguiente</button>

    </form>

    <script>
        let datos = @json($datos);
        console.log(datos);
    </script>

</body>
</html>
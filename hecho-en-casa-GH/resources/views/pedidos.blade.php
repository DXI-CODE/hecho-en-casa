<link rel="stylesheet" href="{{ asset('css/pedidos.css') }}">
<link rel="stylesheet" href="{{ asset('css/pedidosTempPop.css') }}">
 
    <title>Pedidos</title>
    <x-menu />
  
<div class = "titule">
    <h2>PEDIDOS</h2>
</div>
<div class="flexi">
    
    <div class = "contenedor"><!-- café-->
        <form id="formularioPedidos" action="" method="">
            <div class="dosColumnas">
                <div class="columna">
                    <div class="fila">
                        <label for="fechaEntrega">Fecha de entrega:</label>
                        <input type="text" id="fechaEntrega" name="fechaEntrega" placeholder="{{session('fecha_entrega')}}" readonly>
                    </div>
                    <div class="fila">
                        <label for="horaEntrega">Hora de entrega:</label>
                        <input type="text" id="horaEntrega" name="horaEntrega" placeholder="{{session('hora_entrega')}}" readonly>
                        <!--<div class="hora-selector">
                            <input type="time" id="horaEntrega" name="horaEntrega" min="11:00" max="19:00" required>
                            <div class="boton-wrapper">
                                <button type="button" id="incrementarHora" class="hora-boton">🔺</button>
                                <button type="button" id="decrementarHora" class="hora-boton">🔻</button>                                        
                            </div>
                        </div>-->
                    </div>
                    <div class="fila">
                        <label for="tipoPostre">Tipo de postre:</label>
                        <input type="text" id="tipoPostre" name="tipoPostre" placeholder="{{session('nombre_categoria')}}" readonly>
                    </div>
                    <div class="fila">
                        <label for="unidad_m"> 
                            {{ session('lista_unidad')[0]['nombreunidad'] == 'Porciones' ? 'porciones:' : 
                               (session('lista_unidad')[0]['nombreunidad'] == 'Piezas' ? 'piezas:' : 
                               (session('lista_unidad')[0]['nombreunidad'] == 'Piezas Mini' ? 'piezas mini:' : 'Cantidad:')) }}
                        </label>  

                        <div class="opciones">
                            @if (session('lista_unidad') && count(session('lista_unidad')) > 0)
                                @foreach (session('lista_unidad') as $unidad)
                                <label>
                                    <input type="radio" name="porciones" value="{{ $unidad['cantidadporciones'] }}|{{ $unidad['nombreunidad'] }}" required>
                                    <span class="blanca">{{ $unidad['cantidadporciones'] }}</span>
                                </label>
                                @endforeach
                            @else
                                <p class="blanca">No hay opciones disponibles</p>
                            @endif
                        </div>
                
                    </div>
                    <div class="fila">
                        <label for="cantidad">Cantidad:</label>
                        <div class="cantidad-wrapper">
                            
                            <input type="text" id="cantidad" name="cantidad" value="1" min="{{session('cantidad_minima')}}" placeholder="{{session('cantidad_minima')}}" required>
                            <div class="boton-wrapper">
                                <button type="button" class="incrementar">🔺</button>
                                <button type="button" class="decrementar">🔻</button>
                            </div>
                            
                        </div>
                    </div>
                    <div class="fila">
                        <label for="sabor">Sabor:</label>
                        <input type="text" id="sabor" name="sabor" placeholder="{{session('sabor_postre')}}" readonly>
                    </div>
                </div>

                @if (!empty($atributosSesion))
                    @foreach ($atributosSesion as $nombreTipo => $atributos)
                        <label for="{{ strtolower($nombreTipo) }}">{{ ucfirst($nombreTipo) }}:</label>
                        <select id="{{ strtolower($nombreTipo) }}" name="{{ strtolower($nombreTipo) }}">
                            @foreach ($atributos as $atributo)
                                <option value="{{ $atributo }}">{{ ucfirst($atributo) }}</option>
                            @endforeach
                        </select>
                    @endforeach
                @endif

                <div class="columna">
                    <div class="fila">
                        <label for="tipoEntrega">Tipo de entrega:</label>
                        <div class="custom-select">
                            <button id="toggleSelect" class="custom-select-button">🔻</button>
                            <div id="selectOptions" class="custom-select-options" style="display: none;">
                                <div class="option" data-value="opcion1">Recoger en sucursal</div>
                                <div class="option" data-value="opcion2">Envío a domicilio</div>
                            </div>
                            <input type="hidden" id="tipoEntrega" name="tipoEntrega" value="">
                        </div>
                    </div>
                    <div class="fila">
                        <label for="costo">Costo:</label>
                        <input type="number" id="costo" name="costo" readonly><br>
                        <p class="nota">NOTA: El costo es aproximado, el precio final puede variar según su ubicación.</p>
                    </div>
                </div>
            </div>
            <div class="arrows">
                <button id="prev" class="arrow">⬅</button>
                <button id="next" class="arrow">➡</button>
            </div>

            <div class="fondo-emergente" id="fondoEmergente">
                <div class="emergente">    
                    <p class="mensajeEmergente">¿Estás seguro de tu elección?</p>
                    <br>
                    <button id="editar" class="botoncito">Seguir editando</button>
                    <button id="continuar" class="botoncito" type="submit">Continuar</button>
                </div>
            </div>
        </form>  

        <script>
            function sumarSeleccionado() {
                let total = 0;
        
                let opcionesSeleccionadas = document.getElementById("unidadm").selectedOptions;
                for (let i = 0; i < opcionesSeleccionadas.length; i++) {
                    let opcion = opcionesSeleccionadas[i].value.split('|'); 
                    let precioUnidad = parseFloat(opcion[2]); 
                    total += isNaN(precioUnidad) ? 0 : precioUnidad;
                }
        
    
                let selectsAtributos = document.querySelectorAll("select[id^='atributo']");
                selectsAtributos.forEach(select => {
                    let opcionAtributoSeleccionada = select.selectedOptions[0]; 
                    if (opcionAtributoSeleccionada) {
                        let precioAtributo = parseFloat(opcionAtributoSeleccionada.value.split('|')[1]); 
                        total += isNaN(precioAtributo) ? 0 : precioAtributo;
                    }
                });
        
                document.getElementById("costo").value = total.toFixed(2); 
            }
        </script>    
        
    </div>
</div>
<x-pie/>

<script src="{{ asset('js/pidiendo.js') }}" defer></script>


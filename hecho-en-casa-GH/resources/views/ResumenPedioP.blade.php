<title>RESUMEN PERSONALIZADO</title>
<link rel="stylesheet" href="{{ asset('css/ResumenPedidoP.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<x-menu /> 

</head>
<body>

<!-- Título de la página -->
<h1>RESUMEN DE PEDIDO</h1>

   <div class="main-container">
       <!-- Tarjeta de perfil -->
       <!-- <div class="resumen-card"> -->
       <div class="resumen-card"> 

           <div class="FOLIO-info"> <!--user-info -->
               <h2 class="Folio-name">Pedido con folio:</h2>
               <input type="text" id="folio" name="folio" value="Folio P0520" readonly>
             
           </div>

           <div class="details">

               <div class="left-column">
                   <label>Tipo de postre:</label>
                   <input type="text" id="tipo_postre" value="Selección" readonly>

                   <label>Porciones:</label>
                   <input type="text" id="porciones" value="000" readonly>

                   <label>Cantidad:</label>
                   <input type="text" id="cantidad" value="00" readonly>

                   <label>Sabor de pan:</label>
                   <input type="text" id="sabor" value="Selección" readonly>

                   <label>Sabor de relleno:</label>
                   <input type="text" id="sabor_relleno" value="Selección" readonly>

                   <label>Cobertura:</label>
                   <input type="text" id="cobertura" value="Selección" readonly>

                   <label>Temática:</label>
                   <input type="text" id="tematica" value="Selección" readonly>
               </div>

               <div class="right-column">

                    <label>Nombre:</label>
                   <input type="text" id="nombre" value="Fulanito1" readonly>
                   
                   <label>Teléfono:</label>
                   <input type="text" id="telefono" value="000 0000 000" readonly>

                   <label>Fecha de entrega:</label>
                   <input type="text" id="fecha_entrega" value="DD/MM/YYYY" readonly>

                   <label>Tipo de entrega:</label>
                   <input type="text" id="tipo_entrega" value="Selección" readonly>

                   <label>Link de referencia:</label>
                   <input type="text" id="link" value="https..." readonly>

                   <label>Descripción detallada:</label>
                   <input type="text" id="descripcion" value="Descripción..." readonly>

                   <label>Costo Apróximado:</label>
                   <input type="text" id="costo" value="$00000" readonly>
               </div>
           </div>
           <button class="descargarPDF-button"> 
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAAXNSR0IArs4c
                    6QAAAclJREFUaEPtmuFNxDAMhX2bwCTAJjAJMAlsAkwCm0Cf1EpVLmnsBrdO+yLdj7smrZ8/23UCFznZuJxMr1Dw0YmTM
                    AkfzAMM6YMBvZJDws6EX0TkOXnG6/Adv28ytiZMwSJCwp6xzZD29O5YnFi0WKUdw4w57Ohc3JrvYb6HnUOMOezsYOYwc9
                    g5xJjDo4NzG3LtJv1RRG4KoO5E5D659ikiX4X5P8O93pXQVTaXCP9mHqKNBoj9VhpZm/YwOAgO0QyVzR6CYRwov2msXJh
                    jEYvb7Cq41EZqfQCqEGwZuwtGaINymrM1EWvEhiAMIyD6Y6GIpeJRpG5rHilc353wZJeliFnzdq49jGBtEWsRGyak5wRy
                    ffR0fW3ehiU85XOuiP2H2JCEc0WspUiltStUDs+Nmxex1rwNHdJz49CJga62bdS8qcIS1hi/Zg4FD4cLV3sFr83DGkKta
                    0iYhHMeGOMKG/jSqUVr6G25Xp3D2OFYt3VbCtE8C0dDT+nEUtGCWIjueWSbmqVzqqVmP7ojQDZ7+Fc7mEMe4y/2IB49p9
                    G54YN/kil2cDXB0Uma7aNgs8s6W0DCnQEzm0vCZpd1toCEOwNmNvd0hP8ASzRtPa2Gq1AAAAAASUVORK5CYII=" 
                    alt="Guardar"> Descargar resumen
                </button>

                <button id="next" class="arrow">➡</button>
      <!--  </div>-->
            </div>
   </div>

   <script src="{{ asset('js/ResumenPedidoP.js') }}"></script>
   <script>
        document.addEventListener("DOMContentLoaded", (event) => {

            let datos = @json($datos);
            let ticket_pastel = @json($ticket_pastel);
            let ticket_pedido = @json($ticket_pedido);
            console.log(datos);
            console.log(ticket_pastel);
            console.log(ticket_pedido);

        });
    
    </script>


</body>

<x-pie/>

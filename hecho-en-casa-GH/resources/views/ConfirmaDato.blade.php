
<title>CONFIRMA TUS DATOS</title>
<link rel="stylesheet" href="{{ asset('css/ConfirmaDato.css') }}">

<x-menu /> 
  
</head>
<body>
   <h1>CONFIRMA TUS DATOS</h1>
   
   
   <div class="main-container">
    <div class="container">
       <form>
           <!-- Teléfono -->
           <label for="telefono">Teléfono:</label>
           <input type="text" id="telefono" name="telefono" placeholder="000 0000 000" required>

           <!-- Ubicación del pedido -->
           <div class="radio-group">
               <label><input type="radio" name="ubicacion" value="predeterminada" onclick="toggleAddressFields()"> Av. Oleoducto esq. 18 de Marzo S/N Col. Hidalgo Oriente Salina Cruz Oaxaca.</label>
               <label><input type="radio" id="other" name="ubicacion" value="otra" onclick="toggleAddressFields()"> Otra...</label>
           </div>

           <!-- Vista emergente para ingresar nueva dirección -->
           <div id="address-fields" class="address-fields">
               <label for="codigo-postal">Código postal:</label>
               <input type="text" id="codigo-postal" name="codigo-postal">
               
               <div id="botonCP" class="botonCP">
               <button type="button" id="confirm-cp">
               <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34
               AAAAAXNSR0IArs4c6QAAAPBJREFUSEvNlIENwjAMBL+bwCYwCpPQTWATYBM2gb6UR6lJSOJQaKSq
               iqL82Y7fAxZew8L6sIAdgBOAjRN8B3AAcNV9C7hMh4T0LEK2OcAjHHhL93bfCq0KwHfie92mrMeQ
               +dcykDjfK665C8DozkGIgebEedYMoPgxiO9DGVgWG7maphnAaNm6/LMU/HLirgxUEkG4n/W5MUxz
               BrqvTLh/mSjhRjdAmTD6T6sLUDM+/g/IDTuWhm2qEsVesJlxkqqlk+OafZ+aqIJQUF6w4sVxnapz
               qxdmGrVjOYaUvOACxIYrecENqPVCF6DGC78FPAFFD0MZXIF3GgAAAABJRU5ErkJggg=="/>Confirmar CP
            </button>
            </div>

               <p>
                  <a href="https://www.correosdemexico.gob.mx/sslservicios/consultacp/descarga.aspx" target="_blank">
                     No conozco mi código postal
                     <p></p>
                  </a>
               </p>

               <label for="estado">Estado:</label>
               <input type="text" id="estado" name="estado" disabled>

               <label for="ciudad">Ciudad:</label>
               <input type="text" id="ciudad" name="ciudad"disabled>

               <div class="form-control">
                <label>Colonia:</label>
                <select name="colonia" id="colonia" require>
                    <option value="">Selecciona una Colonia:</option>
                    <option value="Porfirio">Porfirio Díaz</option>
                    <option value="hidalgo oriente">Hidalgo Oriente</option>
                    <option value="centro">Centro</option>
                    <option value="barrio espinal">Barrio Espinal</option>
                </select>
                    <p></p>
              </div>

               <label for="calle">Calle:</label>
               <input type="text" id="calle" name="calle">

               <label for="numero">Número int:</label>
               <input type="text" id="numeroInt" name="numeroI">

               <label for="numero">Número ext:</label>
               <input type="text" id="numeroExt" name="numeroE">

              <div class="checklist">
               <label>
                  <input type="checkbox" name="opciones" value="opcion1"> Establecer como predeterminada
               </label>
            </div>
            
           </div>

           <!-- Botón confirmar -->
           <button type="submit">Confirmar</button>
       </form>
   </div>
   </div>

   <script src="{{ asset('js/ConfirmaDato.js') }}"></script>

</body>

<x-pie/>

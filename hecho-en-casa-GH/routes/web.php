<?php

use App\Models\Elemento;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorInicio;
use App\Http\Controllers\ControladorCalendario;
use App\Http\Controllers\ControladorCatalogo;
use App\Http\Controllers\ControladorCatalogoEmergente;
use App\Http\Controllers\ControladorCatalogoPersonalizado;
use App\Http\Controllers\ControladorLogIn;
use App\Http\Controllers\ControladorRegistro;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Middleware\CheckSession;

Route::get('/', [ControladorInicio::class, 'index'])->name('inicio.get');

Route::get('/conocenos', [ControladorCalendario::class, 'index']);

Route::get('/buscarpedido', [ControladorCalendario::class, 'index']);
Route::post('/buscarpedido', [ControladorCalendario::class, 'index']);

/*INICIO DE SESIÓN */

Route::get('/perfil', [ControladorCalendario::class, 'index']);
Route::put('/perfil', [ControladorCalendario::class, 'index']);

/*Route::get('/iniciar-sesion', [ControladorCalendario::class, 'index']);*/
Route::get('/login', [AuthController::class, 'mostrarLogin'])->name('login.get');
Route::post('/login', [AuthController::class, 'Logear'])->name('login.post');

//REGISTRO DE USUARIO NUEVO
Route::get('/registrar', [ControladorRegistro::class, 'index'])->name('registrar.get');
Route::post('/registrar', [ControladorRegistro::class, 'registrar'])->name('registrar.post');

Route::get('/contrasena', [ControladorRegistro::class, 'contrasena'])->name('registrar.contrasena.get');
Route::post('/contrasena', [ControladorRegistro::class, 'guardarContrasena'])->name('registrar.guardarContrasena.post');

Route::get('/direccion', [ControladorRegistro::class, 'mostrarDireccion'])->name('registrar.direccion.get');
Route::post('/direccion', [ControladorRegistro::class, 'guardarDireccion'])->name('registrar.guardarDireccion.post');

Route::get('/cerrar-sesion', [AuthController::class, 'logout'])
->middleware(CheckSession::class);

//Route::delete('/cerrar-sesion', [ControladorCalendario::class, 'logout.post']);
//antes de entrar a esta vista el correo tiene que estar validado y ser enviado
Route::get('/recuperar-clave', [MailController::class, 'mostrar'])->name('recuperar-clave.get');
Route::post('/recuperar-clave', [MailController::class, 'enviarCorreo'])->name('enviar-correo.post');
Route::get('/recuperar-clave/{token}', [ControladorCalendario::class, 'index']);

/*

/*RUTAS DE POSTRES FIJOS */
/*PETICIÓN DE PRUEBA MEDIANTE API.PHP */
//Route::get('fijo/categorias', [ControladorCatalogo::class, 'obtenerCategorias']);

Route::get('fijo/catalogo/{categoria?}', [ControladorCatalogo::class, 'mostrarCatalogo'])
->name('fijo.catalogo.get');
Route::post('fijo/catalogo/{categoria?}', [ControladorCatalogo::class, 'guardarSeleccionCatalogo'])
->name('fijo.catalogo.post');

//esta ruta usa el mismo metodo para los tres tipos de postre entonces todo se manejara desde aqui

Route::get('seleccionar-fecha/{mes?}/{anio?}', [ControladorCatalogo::class, 'mostrarCalendario'])
->name('calendario.get')
->middleware(CheckSession::class);

Route::post('seleccionar-fecha/{mes?}/{anio?}', [ControladorCatalogo::class, 'seleccionarFecha'])
->name('calendario.post')
->middleware(CheckSession::class);

Route::get('fijo/detalles-pedido', [ControladorCatalogo::class, 'mostrarDetalles'])
->name('fijo.detallesPedido.get')
->middleware(CheckSession::class);

Route::post('fijo/detalles-pedido', [ControladorCatalogo::class, 'seleccionarDetalles'])
->name('fijo.detallesPedido.post')
->middleware(CheckSession::class);

Route::get('fijo/detalles-direccion', [ControladorCatalogo::class, 'mostrarDireccion'])
->name('fijo.direccion.get')
->middleware(CheckSession::class);

Route::post('fijo/detalles-direccion', [ControladorCatalogo::class, 'guardarDireccion'])
->name('fijo.direccion.post')
->middleware(CheckSession::class);

Route::get('fijo/ticket/{folio}', [ControladorCatalogo::class, 'mostrarTicket'])
->name('fijo.ticket.get')
->middleware(CheckSession::class); 

/*RUTAS DE POSTRES PERSONALIZADOS */


Route::get('/personalizado', [ControladorCatalogoPersonalizado::class, 'mostrarCatalogo'])
->name('personalizado.catalogo.get');
Route::post('/personalizado', [ControladorCatalogoPersonalizado::class, 'seleccionarCatalogo'])
->name('personalizado.catalogo.post');

/* Route::get('personalizado/seleccionar-fecha/{mes?}/{anio?}', [ControladorCatalogo::class, 'mostrarCalendario'])->name('personalizado.calendario.get');
Route::post('personalizado/seleccionar-fecha/{mes?}/{anio?}', [ControladorCatalogo::class, 'seleccionarFecha'])->name('personalizado.calendario.post');
 */
Route::get('personalizado/detalles-pedido', [ControladorCatalogoPersonalizado::class, 'mostrarDetalles'])
->name('personalizado.detallesPedido.get')
->middleware(CheckSession::class);

Route::post('personalizado/detalles-pedido', [ControladorCatalogoPersonalizado::class, 'seleccionarDetalles'])
->name('personalizado.detallesPedido.post')
->middleware('auth.session');

Route::get('personalizado/detalles-direccion', [ControladorCatalogoPersonalizado::class, 'mostrarDireccion'])
->name('personalizado.direccion.get')
->middleware(CheckSession::class);

Route::post('personalizado/detalles-direccion', [ControladorCatalogoPersonalizado::class, 'guardarDireccion'])
->name('personalizado.direccion.post')
->middleware(CheckSession::class);

Route::get('personalizado/ticket/{folio}', [ControladorCatalogoPersonalizado::class, 'mostrarTicket'])
->name('personalizado.ticket.get')
->middleware(CheckSession::class);


/* RUTAS DE POSTRES EMERGENTES  */


Route::get('/emergentes', [ControladorCatalogoEmergente::class, 'mostrar'])
->name('emergentes.get');
Route::post('/emergentes', [ControladorCatalogoEmergente::class, 'seleccionar'])
->name('emergentes.post');

Route::get('emergentes/detalles-pedido', [ControladorCatalogoEmergente::class, 'mostrarDetalles'])
->name('emergente.detallesPedido.get')
->middleware(CheckSession::class);

Route::post('emergentes/detalles-pedido', [ControladorCatalogoEmergente::class, 'seleccionarDetalles'])
->name('emergente.detallesPedido.post')
->middleware(CheckSession::class);

Route::get('emergentes/detalles-direccion', [ControladorCatalogo::class, 'mostrarDireccion'])
->name('emergente.direccion.get')
->middleware(CheckSession::class);

Route::post('emergentes/detalles-direccion', [ControladorCatalogoEmergente::class, 'seleccionarDireccion'])
->name('emergente.direccion.post')
->middleware(CheckSession::class);

Route::get('emergentes/ticket/', [ControladorCatalogo::class, 'mostrarTicket'])
->name('emergente.ticket.get')
->middleware(CheckSession::class);
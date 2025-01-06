<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ControladorRegistro extends Controller
{
    public function index(){
        return view('registrar');
    }

    public function registrar(Request $request){

        $nombre = $request->input('name');
        $apellido_paterno = $request->input('apellidoP');
        $apellido_materno = $request->input('apellidoM');
        $telefono = $request->input('phone');
        $correo = $request->input('email');
        $correo_existe = usuario::where('correo_electronico', $correo)->first();

        if ($correo_existe) {
            // Redirigir de vuelta con un mensaje de error
            return redirect()->back()
            ->withErrors(['email' => 'El correo ya está registrado. Por favor, ingresa otro.'])
            ->withInput();
        }

        $action = $request->input('action');
        
        session([
            'nombre'=>$nombre,
            'apellido_paterno' => $apellido_paterno,
            'apellido_materno' => $apellido_materno,
            'telefono' => $telefono,
            'correo' => $correo,
        ]);

        if($action === 'login'){
            return redirect()->route('login.get');
        }elseif($action === 'register'){
            return redirect()->route('registrar.contrasena.get');
        }
    }

    public function contrasena(){
        return view('contrasena');
    }

    public function guardarContrasena(Request $request){
        $contrasena = $request->input('confirmacion');
        session(['contrasena' => $contrasena]);
        return redirect()->route('registrar.direccion.get'); 
    }

    public function mostrarDireccion(){
        return view('direccion');
    }

    public function guardarDireccion(Request $request){
        
        $usuario = new usuario;
        $usuario->correo_electronico = session('correo');
        $usuario->nombre = session('nombre');
        $usuario->apellido_paterno = session('apellido_paterno');
        $usuario->apellido_materno = session('apellido_materno');
        $usuario->telefono = session('telefono');
        $usuario->Codigo_postal_u = $request->input('codigoPostal'); 
        $usuario->estado_u = $request->input('estado');
        $usuario->ciudad_u = $request->input('ciudad');
        $usuario->colonia_u = $request->input('colonia');
        $usuario->calle_u = $request->input('calle');
        $usuario->num_exterior_u = $request->input('num'); ///<-----------AQUI SE TIENE QUE SEPARAR EN DOS CAMPOS
        //$usuario->referencia_u = $request->input('referencia');
        $usuario->contraseña = bcrypt(session('contrasena'));
        $usuario->token_recuperacion = Str::random(64);
        try{
            $usuario->save();
        }catch(\Exception $e){
            dd("Error al guardar el pedido: " . $e->getMessage());
        }
        
        return redirect()->route('login.get');
    }

    public function mostrarRecuperacion()
    {
        return view('prueba-recuperacion');
    } 

    public function mostrarCambio(){
        $correo = session('correo');
        $usuario = usuario::where('correo_electronico', $correo);
        if($usuario){
            //if($usuario->token_recuperacion === $)
        }
        return view('cambiar-contrasenaPrueba');
    }

    public function actualizarContrasena(Request $request){
        $contrasena = $request->input('confirmar_contraseña');
        $correo = session('correo');
        //$usuario =
    }
}

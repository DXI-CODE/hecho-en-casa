<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Catalogo;
use App\Models\Categoria;

class ControladorCatalogo extends Controller
{

    public function mostrar($categoria = null)
    {
        $categorias = Categoria::all();
    
        if ($categorias->isNotEmpty()) {
            if ($categoria === null) {
                $catalogo = Catalogo::select('id_postre', 'id_tipo_postre', 'id_categoria', 'imagen', 'nombre', 'descripcion')
                    ->where('id_tipo_postre', 'fijo')
                    ->where('id_categoria', 1)
                    ->get();
            }
            else {
                $catalogo = Catalogo::select('id_postre', 'id_tipo_postre', 'id_categoria', 'imagen', 'nombre', 'descripcion')
                    ->where('id_tipo_postre', 'fijo')
                    ->where('id_categoria', $categoria)
                    ->get();
            }
            if ($catalogo->isEmpty()) {
                abort(404, 'Catálogo no encontrado');
            }
            return view('catalogo', compact('categorias'))
                ->with('catalogo', $catalogo);
        }
        else {
            abort(500, 'Error interno del servidor');
        }
    }
    

    public function mostrarFecha(){
        
    }

    public function seleccionarFecha(){

    }

    public function mostrarDetalles(){

    }

    public function seleccionarDetalles(){

    }

    public function mostrarDetallesEntrega(){

    }

    public function seleccionarDetallesEntrega(){

    }

    public function mostrarTicket(){

    }
}

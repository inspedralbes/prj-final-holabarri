<?php
    namespace App\Http\Controllers;

    use App\Models\Categoria;
    use Illuminate\Http\Request;

    class CategoriaController extends Controller {
        public function index() {
            $categorias = Categoria::all();
            return response()->json($categorias);
        }

        public function ComerciosOfCategorias($categoriaId){
            $categoria = Categoria::with('comercios')->find($categoriaId);

            if(!$categoria) {
                return response() -> json(['message' => 'No s\'han trobat categorias']);
            }

            return response()->json($categoria->comercios,200);
        }

        public function getProductosPorCategoria($categoriaId) {
            $productos = Categoria::where('id', $categoriaId)
                ->with('comercios.productos')
                ->get()
                ->pluck('comercios')
                ->flatten()
                ->pluck('productos')
                ->flatten()
                ->map(function ($producto) {
                    $comercio = \App\Models\Comercio::find($producto->comercio_id);
                    $producto->comercio_nombre = $comercio ? $comercio->nombre : 'Desconocido';
        
                    return $producto;
                }) -> toArray();
        
            shuffle($productos);
            return response()->json($productos);
        }
        
    }
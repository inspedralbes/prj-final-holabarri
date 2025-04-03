<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\comercioFavoritos;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;

    class ComercioFavoritosController extends Controller {
        public function index() {
            $clienteId = Auth::id();
            
            if (!$clienteId) {
                return response()->json(['error' => 'Usuario no autenticado'], 401);
            }
        
            $comerciosFavoritos = comercioFavoritos::with('comercio')->where('cliente_id', $clienteId)->get();
        
            return response()->json($comerciosFavoritos);
        }        
        
        
        

        public function create() { }

        public function afegirLikeComerci(Request $request, $comercioId) {
            $clienteId = Auth::id();
        
            if (!$comercioId) {
                return response()->json(['error' => 'ID de comercio no proporcionado'], 400);
            }
        
            $favorito = comercioFavoritos::where('cliente_id', $clienteId)
                ->where('comercio_id', $comercioId)
                ->first();
        
            if ($favorito) {
                $favorito->delete();
                return response()->json(['message' => 'Comercio eliminado de favoritos']);
            }
        
            comercioFavoritos::create([
                'cliente_id' => $clienteId,
                'comercio_id' => $comercioId,
            ]);
        
            return response()->json(['message' => 'Comercio añadido a favoritos']);
        }
        
        public function verificarSeguido($comercioId) {
            $clienteId = Auth::id();
        
            $seguido = comercioFavoritos::where('cliente_id', $clienteId)
                ->where('comercio_id', $comercioId)
                ->exists();
        
            return response()->json(['seguido' => $seguido]);
        }
    }
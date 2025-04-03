<?php
    namespace App\Http\Controllers;

    use App\Models\Favorito;
    use App\Models\Producto;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Validator;

    class FavoritoController extends Controller {
        // Obtener productos favoritos del usuario autenticado
        public function index() {
            $favoritos = Favorito::where('cliente_id', Auth::id())->pluck('producto_id');
            return response()->json($favoritos);
        }

        // Añadir o quitar de favoritos
        public function toggleFavorito(Request $request) {
            $clienteId = Auth::id();
            $productoId = $request->producto_id;

            $favorito = Favorito::where('cliente_id', $clienteId)->where('producto_id', $productoId)->first();

            if ($favorito) {
                // Si ya está en favoritos, lo eliminamos
                $favorito->delete();
                return response()->json(['message' => 'Producto eliminado de favoritos']);
            } else {
                // Si no está en favoritos, lo añadimos
                Favorito::create([
                    'cliente_id' => $clienteId,
                    'producto_id' => $productoId,
                ]);
                return response()->json(['message' => 'Producto añadido a favoritos']);
            }
        }

        public function getFavoritosInformacion() {
            $favoritos = Favorito::where('cliente_id', Auth::id())->pluck('producto_id');

            // Obtener los productos favoritos con más detalles
            $productos = Producto::whereIn('id', $favoritos)->get();

            return response()->json($productos);
        }
    }
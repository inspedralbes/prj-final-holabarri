<?php
    namespace App\Http\Controllers;

    use Validator;
    use App\Models\Comercio;
    use App\Models\Producto;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Storage;

    class ProductoController extends Controller {
        public function index() {
            $productos = Producto::with('subcategoria', 'comercio')->get()->map(function ($producto) {
                return [
                    "id" => $producto->id,
                    "nombre" => $producto->nombre,
                    "descripcion" => $producto->descripcion,
                    "subcategoria_id" => $producto->subcategoria_id,
                    'subcategoria' => $producto->subcategoria ? $producto->subcategoria->name : null,
                    "comercio_id" => $producto->comercio_id,
                    "comercio" => $producto->comercio->nombre,
                    "precio" => $producto->precio,
                    "stock" => $producto->stock
                ];
            });
            if ($productos->isEmpty()) {
                return response()->json(['message' => 'No hay productos'], 200);
            }

            return response()->json(['data' => $productos], 200);
        }

        public function getByComercio($comercioID) {
            $productos = Producto::with('subcategoria', 'comercio')->where('comercio_id', $comercioID)->get()->map(function ($producto) {
                return [
                    "id" => $producto->id,
                    "nombre" => $producto->nombre,
                    "descripcion" => $producto->descripcion,
                    "subcategoria_id" => $producto->subcategoria_id,
                    'subcategoria' => $producto->subcategoria ? $producto->subcategoria->name : null,
                    "comercio_id" => $producto->comercio_id,
                    "comercio" => $producto->comercio->nombre,
                    "precio" => $producto->precio,
                    "stock" => $producto->stock
                ];
            });

            if ($productos->isEmpty()) {
                return response()->json(['message' => 'No hay productos'], 200);
            }

            return response()->json($productos);
        }

        public function create() {}

        public function store(Request $request) {
            $user = Auth::user();

            $validated = $request->validate([
                'subcategoria_id' => 'required|exists:subcategorias,id',
                'comercio_id' => 'required|exists:comercios,id',
                'nombre' => 'required|string|max:255',
                'descripcion' => 'required|string',
                'precio' => 'required|numeric',
                'stock' => 'nullable|integer',
                'imagen' => 'required|image|mimes:jpg,jpeg,png,webp',
            ]);

            $imagenPath = $request->file('imagen')->store('productos', 'public');

            $comercio = Comercio::findOrFail($validated['comercio_id']);

            if ($comercio->idUser !== $user->id) {
                return response()->json([
                    'error' => 'No tienes permiso para editar este producto.',
                ], 403);
            }

            $producto = Producto::create([
                'subcategoria_id' => $validated['subcategoria_id'],
                'comercio_id' => $validated['comercio_id'],
                'nombre' => $validated['nombre'],
                'descripcion' => $validated['descripcion'],
                'precio' => $validated['precio'],
                'stock' => $validated['stock'],
                'imagen' => $imagenPath,
            ]);

            return response()->json([
                'message' => 'Producto creado con éxito.',
                'producto' => $producto,
            ], 201);
        }

        public function show($id) {
            $producto = Producto::with('subcategoria', 'comercio')->where('id', $id)->first();

            if (!$producto) {
                return response()->json(['message' => 'Producto no encontrado'], 404);
            }

            return response()->json([
                "id" => $producto->id,
                "nombre" => $producto->nombre,
                "descripcion" => $producto->descripcion,
                "subcategoria_id" => $producto->subcategoria_id,
                "subcategoria" => $producto->subcategoria ? $producto->subcategoria->name : null,
                "comercio_id" => $producto->comercio_id,
                "comercio" => $producto->comercio->nombre,
                "precio" => $producto->precio,
                "stock" => $producto->stock,
                "imagen" => $producto->imagen,
            ], 200);
        }

        public function update(Request $request, $id) {
            $user = Auth::user();

            $request->validate([
                'nombre' => 'required|string|max:60',
                'descripcion' => 'required|string',
                'precio' => 'required|numeric|min:1',
                'subcategoria_id' => 'required|exists:subcategorias,id',
                'comercio_id' => 'required|exists:comercios,id',
                'stock' => "nullable|numeric",
                'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            ]);

            try {
                $producto = Producto::with('comercio')->findOrFail($id);

                if ($request->hasFile('imagen')) {
                    $imagenPath = $request->file('imagen')->store('productos', 'public');
                } else {
                    $imagenPath = $producto->imagen; // Mantén la imagen anterior
                }

                if ($producto->comercio->idUser !== $user->id) {
                    return response()->json([
                        'error' => 'No tienes permiso para editar este producto.',
                    ], 403);
                }

                $producto->update([
                    'nombre' => $request->nombre,
                    'descripcion' => $request->descripcion,
                    'precio' => $request->precio,
                    'subcategoria_id' => $request->subcategoria_id,
                    'comercio_id' => $request->comercio_id,
                    "stock" => $request->stock,
                    'imagen' => $imagenPath,
                ]);

                return response()->json([
                    'message' => 'Producto actualizado con éxito',
                    'data' => $producto
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'error' => 'Producto no actualizado',
                    'details' => $e->getMessage()
                ], 500);
            }
        }

        public function destroy($id) {
            $user = Auth::user();

            $producto = Producto::with('comercio')->findOrFail($id);

            if ($producto->comercio->idUser !== $user->id) {
                return response()->json([
                    'error' => 'No tienes permiso para eliminar este producto.',
                ], 403);
            }

            try {
                $producto->delete();
                return response()->json(['message' => 'Producto eliminado con éxito'], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'error' => 'Producto no eliminado',
                    'details' => $e->getMessage()
                ], 500);
            }
        }

        public function randomProducts() {
            $productos = Producto::with('subcategoria', 'comercio')->get();

            if ($productos->isEmpty()) {
                return response()->json(['message' => 'No hay productos'], 200);
            }

            $productos = $productos->shuffle()->take(8)->map(function ($producto) {
                return [
                    "id" => $producto->id,
                    "nombre" => $producto->nombre,
                    "descripcion" => $producto->descripcion,
                    "subcategoria_id" => $producto->subcategoria_id,
                    "subcategoria" => $producto->subcategoria ? $producto->subcategoria->name : null,
                    "comercio_id" => $producto->comercio_id,
                    "comercio" => $producto->comercio->nombre,
                    "precio" => $producto->precio,
                    "stock" => $producto->stock,
                    "imagen" => $producto->imagen,
                ];
            });

            return response()->json(['data' => $productos], 200);
        }
    }
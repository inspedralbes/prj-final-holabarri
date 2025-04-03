<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Comercio;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('subcategoria', 'comercio')->where('visible', 1)->get()->map(function ($producto) {
            return [
                "id" => $producto->id,
                "nombre" => $producto->nombre,
                "descripcion" => $producto->descripcion,
                "subcategoria_id" => $producto->subcategoria_id,
                'subcategoria' => $producto->subcategoria ? $producto->subcategoria->name : null,
                "comercio_id" => $producto->comercio_id,
                "comercio" => $producto->comercio->nombre,
                "precio" => $producto->precio,
                "stock" => $producto->stock,
                "visible" => $producto->visible
            ];
        });
        if ($productos->isEmpty()) {
            return response()->json(['message' => 'No hay productos'], 200);
        }

        return response()->json(['data' => $productos], 200);
    }

    public function getByComercio($comercioID)
    {
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
                "stock" => $producto->stock,
                "visible" => $producto->visible,
            ];
        });

        if ($productos->isEmpty()) {
            return response()->json(['message' => 'No hay productos'], 200);
        }

        return response()->json($productos);
    }

    public function store(Request $request)
    {
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

        $producto = Producto::with('subcategoria:id,name')->findOrFail($producto->id);

        return response()->json([
            'message' => 'Producto creado con éxito.',
            'producto' => $producto,
        ], 201);
    }

    public function show($id)
    {
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
            "visible" => $producto->visible,
            "imagen" => $producto->imagen,
        ], 200);
    }

    public function update(Request $request, $id)
    {
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

    public function updateVisibility($id)
    {
        $user = Auth::user();

        try {
            $producto = Producto::with('comercio')->findOrFail($id);

            if ($producto->comercio->idUser !== $user->id) {
                return response()->json([
                    'error' => 'No tienes permiso para editar este producto.',
                ], 403);
            }

            $producto->update([
                'visible' => !$producto->visible,
            ]);

            return response()->json([
                'success' => true,
                'data' => $producto
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'details' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
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

    public function randomProducts()
    {
        $productos = Producto::with('subcategoria', 'comercio')->where('visible', 1)->get();

        if ($productos->isEmpty()) {
            return response()->json(['message' => 'No hay productos'], 200);
        }

        $productos = $productos->shuffle()->take(10)->map(function ($producto) {
            return [
                "id" => $producto->id,
                "nombre" => $producto->nombre,
                "descripcion" => $producto->descripcion,
                "subcategoria_id" => $producto->subcategoria_id,
                "subcategoria" => $producto->subcategoria?->name,
                "comercio_id" => $producto->comercio_id,
                "comercio" => $producto->comercio->nombre,
                "precio" => $producto->precio,
                "stock" => $producto->stock,
                "visible" => $producto->visible,
                "imagen" => $producto->imagen,
            ];
        });

        return response()->json(['data' => $productos], 200);
    }

    public function prueba(Request $request) {
        $comercioIds = $request->query('comercioIds');
            
        $comercioIdsArray = explode(',', $comercioIds);
    
        foreach ($comercioIdsArray as $id) {
            if (!is_numeric($id)) {
                return response()->json(['message' => 'Los IDs de los comercios deben ser números válidos'], 400);
            }
        }
    
        $productos = Producto::whereIn('comercio_id', $comercioIdsArray)
            ->where('visible', true) 
            ->inRandomOrder()
            ->limit(20)
            ->with('comercio')
            ->get();
    
        if ($productos->isEmpty()) {
            return response()->json(['message' => 'No hay productos disponibles con stock para los comercios seleccionados'], 404);
        }
    
        $productosConNombreComercio = $productos->map(function($producto) {
            return [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'descripcion' => $producto->descripcion,
                'precio' => $producto->precio,
                'stock' => $producto->stock,
                'imagen' => $producto->imagen,
                'comercio_id' => $producto->comercio_id,
                'comercio_nombre' => $producto->comercio->nombre,
                'subcategoria_id' => $producto->subcategoria_id,
            ];
        });
    
        return response()->json([
            'data' => $productosConNombreComercio,
        ], 200);
    }

    //Busqueda por nombre de producto y la decripcion del producto  
    public function search(Request $request, $searchTerm)
    {
        $validator = Validator::make(['search' => $searchTerm], [
            'searchTerm' => 'required|integer',
        ]);

        if (empty($searchTerm)) {
            return response()->json(['message' => 'El término de búsqueda no puede estar vacío'], 400);
        }

        // Buscar productos por nombre
        $productosPorNombre = Producto::with('subcategoria', 'comercio')
            ->where('nombre', 'like', '%' . $searchTerm . '%')
            ->where('visible', 1)
            ->get();

        // Obtener los IDs de los productos encontrados por nombre
        $idsProductosPorNombre = $productosPorNombre->pluck('id')->toArray();

        // Buscar productos por descripción, excluyendo los que ya se encontraron por nombre
        $productosPorDescripcion = Producto::with('subcategoria', 'comercio')
            ->where('descripcion', 'like', '%' . $searchTerm . '%')
            ->where('visible', 1)
            ->whereNotIn('id', $idsProductosPorNombre)
            ->get();

        // Combinar los resultados
        $productos = $productosPorNombre->concat($productosPorDescripcion);

        // Mapear los resultados para devolver la información requerida
        $productosMapeados = $productos->map(function ($producto) {
            return [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'descripcion' => $producto->descripcion,
                'subcategoria_id' => $producto->subcategoria_id,
                'subcategoria' => optional($producto->subcategoria)->name,
                'comercio_id' => $producto->comercio_id,
                'comercio' => $producto->comercio->nombre,
                'precio' => $producto->precio,
                'stock' => $producto->stock,
                'visible' => $producto->visible,
                'imagen' => $producto->imagen,
            ];
        });

        if ($productosMapeados->isEmpty()) {
            return response()->json(['message' => 'No hay productos que coincidan con tu búsqueda'], 200);
        }

        return response()->json(['data' => $productosMapeados], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comercio;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ComercioController extends Controller
{
    public function RegistrarComercio(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'idUser' => 'required|integer',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'street_address' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'codigo_postal' => 'required|string',
            'num_planta' => 'required|integer',
            'num_puerta' => 'required|integer',
            'descripcion' => 'required|string|max:500',
            'categoria' => 'required|integer',
            'gestion_stock' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $cliente = Comercio::create([
            'nombre' => $request->nombre,
            'idUser' => $request->idUser,
            'email' => $request->email,
            'phone' => $request->phone,
            'calle_num' => $request->street_address,
            'ciudad' => $request->ciudad,
            'provincia' => $request->provincia,
            'codigo_postal' => $request->codigo_postal,
            'num_planta' => $request->num_planta,
            'num_puerta' => $request->num_puerta,
            'categoria_id' => $request->categoria,
            'descripcion' => $request->descripcion,
            'gestion_stock' => $request->gestion_stock,
            'puntaje_medio' => 0,
        ]);

        $verificationUrl = route('verification.verify', ['id' => $cliente->id, 'hash' => sha1($cliente->email)]);

        // Mail::send('emails.verify', ['verificationUrl' => $verificationUrl], function ($message) use ($cliente) {
        //     $message->to($cliente->email)
        //             ->subject('Verificación de email | ·LOCAL');
        // });

        return response()->json([
            'message' => 'Cliente creado exitosamente. Por favor, verifica tu correo electrónico.',
            'cliente' => $cliente
        ], 201);
    }

    public function getComercios()
    {
        $comercios = Comercio::all();
        return response()->json($comercios, 200);
    }

    public function getComercio($id)
    {
        $comercio = Comercio::find($id);

        if ($comercio == null) {
            return response()->json([
                'error' => 'Comercio no encontrado'
            ], 404);
        }

        $productos = Producto::with('subcategoria')
            ->where('comercio_id', $id)
            ->get();

        $productosData = $productos->map(function ($producto) {
            return [
                'producto_id' => $producto->id,
                'nombre' => $producto->nombre,
                'descripcion' => $producto->descripcion,
                'precio' => $producto->precio,
                'stock' => $producto->stock,
                'imagen' => $producto->imagen,
                'subcategoria' => $producto->subcategoria ? [
                    'id' => $producto->subcategoria->id,
                    'name' => $producto->subcategoria->name,
                ] : null,
            ];
        });

        return response()->json([
            'comercio' => $comercio,
            'productos' => $productosData,
        ], 200);
    }


    public function checkUserHasComercio($userId)
    {
        $comercio = Comercio::where('idUser', $userId)->first();
        if ($comercio) {
            return response()->json([
                'message' => 'El usuario tiene un comercio.',
                'comercio' => $comercio,
            ], 200);
        } else {
            return response()->json([
                'message' => 'El usuario no tiene un comercio.'
            ], 404);
        }
    }

    public function updateComercio(Request $request, $id) {
        $comercio = Comercio::find($id);
        if ($comercio == null) {
            return response()->json([
                'error' => 'Comerç no trobat'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'calle_num' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'codigo_postal' => 'required|string',
            'num_planta' => 'required|integer',
            'num_puerta' => 'required|integer',
            'descripcion' => 'required|string|max:500',
            'categoria_id' => 'required|integer',
            'gestion_stock' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Camp invàlid',
            ], 422);
        }

        $comercio->update($request->all());

        return response()->json([
            'message' => 'Comerç actualitzat exitosament.',
            'comercio' => $comercio
        ], 200);
    }

    public function updateComercioImagenes(Request $request, $id) {
        $comercio = Comercio::find($id);
        if ($comercio == null) {
            return response()->json([
                'error' => 'Comerç no trobat'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'imagenes' => 'nullable|array',
            'imagenes.*' => 'image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Camp invàlid',
            ], 422);
        }

        $imagenesPaths = [];
        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $path = $imagen->store('comercios', 'public');
                $imagenesPaths[] = $path;
            }
        }

        $comercio->update([
            'imagenes' => json_encode($imagenesPaths),
        ]);

        return response()->json([
            'message' => 'Imatges actualitzades exitosament.',
            'comercio' => $comercio
        ], 200);
    }

    public function deleteComercioImagen(Request $request, $id) {
        $comercio = Comercio::find($id);
        if (!$comercio) {
            return response()->json(['error' => 'Comerç no trobat'], 404);
        }

        $imageToRemove = $request->input('image'); // Path or filename
        if (!$imageToRemove) {
            return response()->json(['error' => `No s'ha proporcionat la imatge a eliminar`], 422);
        }

        $images = json_decode($comercio->imagenes, true) ?? [];
        $index = array_search($imageToRemove, $images);
        if ($index === false) {
            return response()->json(['error' => `La imatge no s'ha trobat`], 404);
        }

        Storage::disk('public')->delete($images[$index]);
        array_splice($images, $index, 1);
        $comercio->imagenes = json_encode($images);
        $comercio->save();

        return response()->json([
            'message' => 'Imatge eliminada correctament.',
            'comercio' => $comercio
        ], 200);
    }

    public function search($search) {
        $validator = Validator::make(['search' => $search], [
            'searchTerm' => 'required|integer',
        ]);

        if (empty($search)) {
            return response()->json(['message' => 'El término de búsqueda no puede estar vacío'], 400);
        }
        
        $comercios = Comercio::where('nombre', 'like', "%$search%")->get();

        if ($comercios->isEmpty()) {
            return response()->json(['message' => 'No hay comercios que coincidan con tu búsqueda'], 200);
        }

        $comerciosMapeados = $comercios->map(function ($comercio) {
            return [
                'id' => $comercio->id,
                'nombre' => $comercio->nombre,
                'categoria_id' => $comercio->categoria_id,
                'puntaje_medio' => $comercio->puntaje_medio,
                'imagenes' => $comercio->imagenes,
                'horario' => $comercio->horario,
            ];
        });


        return response()->json(['data' => $comerciosMapeados], 200);
    }
}

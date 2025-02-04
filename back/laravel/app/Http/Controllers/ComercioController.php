<?php

namespace App\Http\Controllers;

use App\Models\Comercio;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            'codigo_postal' => 'required|integer',
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
            'num_planta' => $request->numero_planta,
            'num_puerta' => $request->numero_puerta,
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

    public function getComercio($id) {
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
                'subcategoria' => [
                    'id' => $producto->subcategoria->id,
                    'name' => $producto->subcategoria->name,
                ],
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
                'message' => 'El usuario tiene un comercio.'
            ], 200);
        } else {
            return response()->json([
                'message' => 'El usuario no tiene un comercio.'
            ], 404);
        }
    }
}

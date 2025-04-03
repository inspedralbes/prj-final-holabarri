<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    public function getCliente($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            return response()->json($cliente, 200);
        } else {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }
    }

    public function updateCliente(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $validator = Validator::make($request->all(), [
                'nombre' => 'required',
                'apellido' => 'required',
                'email' => 'required|email',
                'telefono' => 'required',
                'direccion' => 'required',
                'password' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['message' => 'Datos incorrectos'], 400);
            }
            $cliente->nombre = $request->nombre;
            $cliente->apellido = $request->apellido;
            $cliente->email = $request->email;
            $cliente->telefono = $request->telefono;
            $cliente->direccion = $request->direccion;
            $cliente->password = Hash::make($request->password);
            $cliente->save();
            return response()->json($cliente, 200);
        } else {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }
    }

    public function updateDatosPersonales(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'apellidos' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
            ]);
            if ($validator->fails()) {
                return response()->json(['message' => 'Datos incorrectos'], 400);
            }
            $cliente->name = $request->name;
            $cliente->apellidos = $request->apellidos;
            $cliente->email = $request->email;
            $cliente->phone = $request->phone;
            $cliente->save();
            return response()->json($cliente, 200);
        } else {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }
    }

    public function updateDatosFacturacion(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $validator = Validator::make($request->all(), [
                'street_address' => 'required|string',
                'ciudad' => 'required|string',
                'provincia' => 'required|string',
                'codigo_postal' => 'required|numeric',
                'numero_planta' => 'required|numeric',
                'numero_puerta' => 'required|numeric',
            ]);
            if ($validator->fails()) {
                return response()->json(['message' => 'Datos incorrectos'], 400);
            }
            $cliente->street_address = $request->street_address;
            $cliente->ciudad = $request->ciudad;
            $cliente->provincia = $request->provincia;
            $cliente->codigo_postal = $request->codigo_postal;
            $cliente->numero_planta = $request->numero_planta;
            $cliente->numero_puerta = $request->numero_puerta;
            $cliente->save();
            return response()->json($cliente, 200);
        } else {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }
    }

    public function obtenerDatosCliente(Request $request, $id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json([
                'error' => 'Cliente no encontrado.'
            ], 404);
        }

        return response()->json([
            'message' => 'Datos del cliente obtenidos correctamente.',
            'cliente' => [
                'nombre' => $cliente->name,
                'apellidos' => $cliente->apellidos,
                'email' => $cliente->email,
                'phone' => $cliente->phone,
                'street_address' => $cliente->street_address,
                'ciudad' => $cliente->ciudad,
                'provincia' => $cliente->provincia,
                'codigo_postal' => $cliente->codigo_postal,
                'numero_planta' => $cliente->numero_planta,
                'numero_puerta' => $cliente->numero_puerta,
            ]
        ], 200);
    }

    public function checkUser()
    {
        try {
            $user = "Hola";
            if (!$user) {
                return response()->json(['success' => false, "message" => 'User not authenticated'], 200);
            } else {
                return response()->json(['success' => true, "message" => 'User authenticated'], 200);
            }
        } catch (\Throwable $th) {
            return response()->json(['success' => false, "message" => `Error: $th`]);
        }
    }
}
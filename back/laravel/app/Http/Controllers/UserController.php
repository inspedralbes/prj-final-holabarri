<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller {
    public function RegistrarUsuario(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
            'street_address' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'provincia' => 'required|string|max:255',
            'codigo_postal' => 'required|integer',
            'numero_planta' => 'required|integer',
            'numero_puerta' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'street_address' => $request->street_address,
            'ciudad' => $request->ciudad,
            'provincia' => $request->provincia,
            'codigo_postal' => $request->codigo_postal,
            'numero_planta' => $request->numero_planta,
            'numero_puerta' => $request->numero_puerta,
        ]);

        $verificationUrl = route('verification.verify', ['id' => $user->id, 'hash' => sha1($user->email)]);

        Mail::send('emails.verify', ['verificationUrl' => $verificationUrl], function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Verificación de email | ·LOCAL');
        });

        return response()->json([
            'message' => 'Usuario creado exitosamente. Por favor, verifica tu correo electrónico.',
            'user' => $user
        ], 201);
    }


    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'error' => 'Usuario no encontrado.'
            ], 404);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'error' => 'Credenciales incorrectas.'
            ], 401);
        }

        if ($user->email_verified_at === null) {
            return response()->json([
                'error' => 'Por favor, verifica tu correo electrónico antes de iniciar sesión.'
            ], 400);
        }

        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'message' => 'Inicio de sesión exitoso.',
            'token' => $token,
        ], 200);
    }
}
<?php
    namespace App\Http\Controllers\Auth;

    use App\Models\Cliente;
    use App\Models\Comercio;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use App\Http\Controllers\Controller;

    class AuthController extends Controller {
        public function registrar(Request $request) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'email' => 'required|email|unique:cliente,email',
                'password' => 'required|string|min:8|confirmed',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()
                ], 422);
            }

            $cliente = Cliente::create([
                'name' => $request->name,
                'apellidos' => $request->apellidos,
                'email' => $request->email,
                'phone' => null,
                'password' => Hash::make($request->password),
                'street_address' => '',
                'ciudad' => '',
                'provincia' => '',
                'codigo_postal' => null,
                'numero_planta' => null,
                'numero_puerta' => null,
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

            $cliente = Cliente::where('email', $request->email)->first();
            $comercio = Comercio::where('idUser', $cliente->id)->first();

            if (!$cliente) {
                return response()->json([
                    'error' => 'Cliente no encontrado.'
                ], 404);
            }

            if (!Hash::check($request->password, $cliente->password)) {
                return response()->json([
                    'error' => 'Credenciales incorrectas.'
                ], 401);
            }

            // if ($cliente->email_verified_at === null) {
            //     return response()->json([
            //         'error' => 'Por favor, verifica tu correo electrónico antes de iniciar sesión.'
            //     ], 400);
            // }
            
            $token = $cliente->createToken('API Token')->plainTextToken;

            return response()->json([
                'message' => 'Inicio de sesión exitoso.',
                'user' => $cliente,
                'token' => $token,
                'comercio' => $comercio,
            ], 200);
        }
        public function logout(Request $request) {
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'message' => 'Sesión cerrada exitosamente.'
            ], 200);
        }
        public function changePassword(Request $request) {
            $validator = Validator::make($request->all(), [
                'currentPassword' => 'required|string|min:8',
                'newPassword' => 'required|string|min:8',
                'confirmPassword' => 'required|string|min:8|same:newPassword',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()
                ], 422);
            }

            $cliente = $request->user();

            if (!Hash::check($request->currentPassword, $cliente->password)) {
                return response()->json([
                    'error' => 'Contraseña actual incorrecta.'
                ], 400);
            }

            $cliente->password = Hash::make($request->newPassword);
            $cliente->save();

            return response()->json([
                'message' => 'Contraseña cambiada exitosamente.'
            ], 200);
        }
    }
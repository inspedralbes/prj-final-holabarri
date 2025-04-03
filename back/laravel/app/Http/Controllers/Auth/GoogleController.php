<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;;
use App\Models\Cliente;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    // Redirigir a Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Manejar el callback de Google
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = Cliente::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->user['given_name'],
                    'apellidos' => $googleUser->user['family_name'],
                ]
            );
            
            Auth::login($user);
            $token = $user->createToken('auth_token')->plainTextToken;

            $userData = [
                'id' => $user->id,
                'name' => $user->name,
                'apellidos' => $user->apellidos,
                'email' => $user->email,
                'token' => $token,
            ];

            return redirect()->to('http://localhost:3000/auth/callback?user=' . urlencode(json_encode($userData)));
        } catch (\Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }
}



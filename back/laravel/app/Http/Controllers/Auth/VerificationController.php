<?php
    // CAMBIAR EL ROUTE CUANDO VERITIQUE PARA QUE ME LLEVE A OTRO LADO

    namespace App\Http\Controllers\Auth;

    use \App\Models\User;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Auth\Events\Verified;
    use Illuminate\Support\Facades\Auth;

    class VerificationController extends Controller {
        public function verify(Request $request, $id, $hash) {
            $user = User::findOrFail($id);

            if ($user->hasVerifiedEmail()) {
                return redirect()->route('home')->with('message', 'Correo ya verificado.');
            }

            if (sha1($user->email) === $hash) {
                $user->markEmailAsVerified();
                event(new Verified($user));
                return redirect()->route('home')->with('message', 'Correo verificado con éxito.');
            }

            return redirect()->route('home')->with('error', 'El enlace de verificación no es válido.');
        }
    }
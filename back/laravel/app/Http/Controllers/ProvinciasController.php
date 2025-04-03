<?php
    namespace App\Http\Controllers;

    use App\Models\provincias;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class ProvinciasController extends Controller {
        public function index() {
            $provincias = provincias::all();
            return response()->json($provincias);
        }
    }
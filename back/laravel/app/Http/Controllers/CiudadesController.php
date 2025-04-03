<?php
    namespace App\Http\Controllers;

    use App\Models\ciudades;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class ciudadesController extends Controller {
        public function index($parent_code) {
            $ciudades = ciudades::where('parent_code', $parent_code)->get();
            return response()->json($ciudades);
        }
    }
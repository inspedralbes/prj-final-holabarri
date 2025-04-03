<?php
    namespace App\Http\Controllers;

    use App\Models\Subcategoria;
    use Illuminate\Http\Request;

    class SubcategoriaController extends Controller {
        public function index() {

        }

        public function create() {
            //
        }

        public function store(Request $request) {
            //
        }

        public function show($categoria_id) {
            $subcategorias = Subcategoria::with('categoria')
                ->where('categoria_id', $categoria_id)
                ->get();
        
            return response()->json([
                'success' => true,
                'data' => $subcategorias,
            ], 200);
        }
        

        public function edit(Subcategoria $subcategoria) {
            //
        }

        public function update(Request $request, Subcategoria $subcategoria) {
            //
        }

        public function destroy(Subcategoria $subcategoria) {
            //
        }
    }

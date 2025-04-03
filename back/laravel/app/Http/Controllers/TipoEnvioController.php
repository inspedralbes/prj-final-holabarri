<?php
    namespace App\Http\Controllers;

    use App\Models\TipoEnvio;
    use Illuminate\Http\Request;

    class TipoEnvioController extends Controller {
    public function index() {
        return response()->json(TipoEnvio::all(), 200);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

        $tipoEnvio = TipoEnvio::create($data);

        return response()->json($tipoEnvio, 201);
    }


    public function show($id) {
        $tipoEnvio = TipoEnvio::find($id);

        if (!$tipoEnvio) {
            return response()->json(['message' => 'Tipo de envío no encontrado.'], 404);
        }

        return response()->json($tipoEnvio, 200);
    }

    public function update(Request $request, $id) {
        $tipoEnvio = TipoEnvio::find($id);

        if (!$tipoEnvio) {
            return response()->json(['message' => 'Tipo de envío no encontrado.'], 404);
        }

        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

        $tipoEnvio->update($data);

        return response()->json($tipoEnvio, 200);
    }

    public function destroy($id) {
        $tipoEnvio = TipoEnvio::find($id);

        if (!$tipoEnvio) {
            return response()->json(['message' => 'Tipo de envío no encontrado.'], 404);
        }

        $tipoEnvio->delete();

        return response()->json(['message' => 'Tipo de envío eliminado.'], 200);
    }
    }
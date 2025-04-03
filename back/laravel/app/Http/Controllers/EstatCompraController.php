<?php

namespace App\Http\Controllers;

use App\Models\EstatCompra;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstatCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $estats = EstatCompra::all();

            if (!$estats) {
                return response()->json(['message' => 'Error en la petición'], 404);
            }

            return response()->json($estats, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocurrió un error al obtener los detalles de la compra: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EstatCompra $estatCompra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EstatCompra $estatCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EstatCompra $estatCompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EstatCompra $estatCompra)
    {
        //
    }
}

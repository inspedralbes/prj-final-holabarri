<?php

namespace App\Http\Controllers;

use App\Models\Comercio;
use App\Models\OrderComercio;
use App\Models\Order;
use App\Models\ProductoOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderComercioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $user = Auth::user();
            $comercio = Comercio::where('idUser', $user->id)->first();

            $orders = OrderComercio::with('estatCompra', 'order:id,tipo_envio,tipo_pago,cliente_id', 'order.tipoEnvio', 'order.tipoPago', 'order.cliente')
            ->where('comercio_id', $comercio->id)
            ->whereHas('estatCompra', function($query) {
                $query->whereIn('id', [1, 2, 3]);
            })->get();

            if (!$orders) {
                return response()->json(['message' => 'No tiene ninguna orden'], 404);
            }

            return response()->json($orders, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocurrió un error al obtener los detalles de la compra: ' . $e->getMessage()], 500);
        }
    }

    public function historialOrders()
    {
        try {
            $user = Auth::user();
            $comercio = Comercio::where('idUser', $user->id)->first();

            $orders = OrderComercio::with('estatCompra', 'order:id,tipo_envio,tipo_pago,cliente_id', 'order.tipoEnvio', 'order.tipoPago', 'order.cliente')
            ->where('comercio_id', $comercio->id)
            ->whereHas('estatCompra', function($query) {
                $query->whereIn('id', [4, 5]);
            })->get();

            if (!$orders) {
                return response()->json(['message' => 'No tiene ninguna orden'], 404);
            }

            return response()->json($orders, 200);
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
        try {
            $user = Auth::user();

            $request->validate([
                'order_id' => 'required|exists:orders,id',
                'suborders' => 'required|array',
                'suborders.*.comercio_id' => 'required|exists:comercios,id',
                'suborders.*.subtotal' => 'required|numeric|min:0',
                'suborders.*.productos' => 'required|array',
                'suborders.*.productos.*.id' => 'required|exists:productos,id',
                'suborders.*.productos.*.cantidad' => 'required|numeric|min:1',
                'suborders.*.productos.*.precio' => 'required|numeric|min:0',
            ]);

            $order = Order::findOrFail($request->order_id);

            if ($order->cliente_id === $user->id) {

                $productosInsertar = [];
                $subordersCreadas = [];

                foreach ($request->suborders as $suborder) {
                    $suborderCreated = OrderComercio::create([
                        'order_id' => $order->id,
                        'comercio_id' => $suborder['comercio_id'],
                        'subtotal' => $suborder['subtotal'],
                        'estat' => 1,
                        'created_at' => now()
                    ]);

                    $suborderCompleta = OrderComercio::where('id', $suborderCreated->id)->with('estatCompra')->first();

                    // $suborder

                    $productos = [];

                    if (isset($suborder['productos']) && is_array($suborder['productos'])) {
                        $productos = collect($suborder['productos'])->map(function ($producto) use ($suborderCompleta) {
                            return [
                                'order_comercio_id' => $suborderCompleta->id,
                                'producto_id' => $producto['id'],
                                'cantidad' => $producto['cantidad'],
                                'precio' => $producto['precio'],
                            ];
                        });
                        $productosInsertar = array_merge($productosInsertar, $productos->toArray());
                    }

                    $subordersCreadas[] = [
                        'suborder' => $suborderCompleta->toArray(),
                        'productos' => $productos->toArray()
                    ];
                }

                ProductoOrder::insert($productosInsertar);

                return response()->json(['subcomandes' => $subordersCreadas], 201);
            }
            return response()->json(['error' => 'No tienes permisos para realizar esta acción'], 403);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocurrió un error al crear la subcomanda: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $user = Auth::user();
            $comercio = Comercio::where('idUser', $user->id)->first();

            $order = OrderComercio::with('estatCompra', 'order:id,tipo_envio,tipo_pago,cliente_id', 'order.tipoEnvio', 'order.tipoPago', 'order.cliente', 'productosCompra.producto')->where('comercio_id', $comercio->id)->where('id', $id)->first();

            if (!$order) {
                return response()->json(['message' => 'No tienes ninguna orden con ID #' . $id . '.'], 404);
            }

            return response()->json($order, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocurrió un error al obtener los detalles de la compra: ' . $e->getMessage()], 500);
        }
    }

    public function showData($id)
    {
        try {
            $user = Auth::user();
            $order = OrderComercio::with('estatCompra', 'order:id,tipo', 'order.tipoEnvio', 'productosCompra.producto')
                ->whereHas('order', function ($query) use ($user) {
                    $query->where('cliente_id', $user->id);
                })
                ->where('id', $id)->first();

            if (!$order) {
                return response()->json(['message' => 'No tienes ninguna orden con ID #' . $id . '.'], 404);
            }

            return response()->json($order, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocurrió un error al obtener los detalles de la compra: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderComercio $orderComercio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $user = Auth::user();
            $comercio = Comercio::where('idUser', $user->id)->first();

            $validated = $request->validate([
                'estat' => 'required|integer|exists:estat_compras,id'
            ]);

            $order = OrderComercio::with('estatCompra', 'order:id,tipo_envio', 'order.tipoEnvio')->where('comercio_id', $comercio->id)->where('id', $id)->first();

            if (!$order) {
                return response()->json(['message' => 'No tienes ninguna orden con ese ID.'], 404);
            }
            $order->estat = $validated['estat'];
            $order->save();
            $order->load('estatCompra');

            return response()->json($order, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocurrió un error al obtener los detalles de la compra: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderComercio $orderComercio)
    {
        //
    }
}

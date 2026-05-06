<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\DetalleVenta;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    
    $items = json_decode($request->input('items'), true);

    if (empty($items)) {
        return redirect()->back()->with('error', 'No seleccionaste ningún producto.');
    }

    try {
        $userId = auth()->id();

DB::transaction(function () use ($items, $userId) {
    $totalVenta = 0;
    $venta = Venta::create([
    'cliente_id' => 1, 
    'descuento'  => 0,
    'total'      => 0,
    'estado'     => 'completada',
]);

    foreach ($items as $item) {
        $producto = Producto::find($item['producto_id']);
        $cantidad = (int) $item['cantidad'];

        if (!$producto || $producto->stock < $cantidad || $cantidad <= 0) {
            $nombre = $producto ? $producto->nombre : 'Producto desconocido';
            throw ValidationException::withMessages([
                'stock' => "El producto '{$nombre}' no tiene suficiente stock."
            ]);
        }

        $subtotal = $producto->precio_venta * $cantidad;
        $totalVenta += $subtotal;

        DetalleVenta::create([
            'venta_id'        => $venta->id,
            'producto_id'     => $producto->id,
            'cantidad'        => $cantidad,
            'precio_unitario' => $producto->precio_venta,
            'subtotal'        => $subtotal,
        ]);

        $stockAnterior = $producto->stock;
        $producto->stock -= $cantidad;
        $producto->save();

        \App\Models\HistorialStock::create([
            'producto_id'       => $producto->id,
            'usuario_id'        => $userId,
            'cantidad_anterior' => $stockAnterior,
            'cantidad_nueva'    => $producto->stock,
            'motivo'            => 'venta registrada',
        ]);
    }

    $venta->total = $totalVenta;
    $venta->save();
});

        return redirect()->route('ventas.registrar')->with('success', '¡Venta registrada correctamente!');

    } catch (ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
    return redirect()->back()->with('error', 'Error al procesar la venta.');
}
}

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        //
    }

    public function registrar()
{
    $productos = Producto::where('stock', '>', 0)->orderBy('nombre')->get();
    return view('ventas.registrar', compact('productos'));
}
}

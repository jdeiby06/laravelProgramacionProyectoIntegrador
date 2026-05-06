<?php
namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\HistorialStock;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalProductos  = Producto::count();
        $totalCategorias = Categoria::count();
        $sinStock        = Producto::where('stock', '<=', 0)->count();
        $stockBajo       = Producto::with('categoria')
                            ->where('stock', '>', 0)
                            ->where('stock', '<', 5)
                            ->get();

        $orden = $request->get('orden', 'desc'); // desc por defecto

        $movimientos = HistorialStock::with(['producto', 'usuario'])
                        ->orderBy('created_at', $orden)
                        ->paginate(5)
                        ->withQueryString();

        return view('dashboard', compact(
            'totalProductos', 'totalCategorias',
            'sinStock', 'stockBajo', 'movimientos', 'orden'
        ));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use illuminate\Database\QueryException;
use Illuminate\Routing\Controller;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pdf(Request $request)
{
    $query = Producto::orderBy('id', 'DESC');

    // Respeta los mismos filtros activos
    if ($request->filled('categoria')) {
        $query->where('id_categoria', $request->categoria);
    }
    if ($request->filled('buscar')) {
        $query->where('nombre', 'like', '%' . $request->buscar . '%');
    }
    if ($request->filled('stock')) {
        if ($request->stock == 'disponible') {
            $query->where('stock', '>', 0);
        } elseif ($request->stock == 'agotado') {
            $query->where('stock', '<=', 0);
        }
    }

    $productos = $query->get();

    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('producto.pdf', compact('productos'));

    return $pdf->download('productos.pdf');
}

    public function __construct()
    {
        $this->middleware('can:producto.create')->only(['create','store']);
        $this->middleware('can:producto.index')->only('index');
        $this->middleware('can:producto.update')->only(['edit','update']);
        $this->middleware('can:producto.destroy')->only('destroy');
    }
    public function index(Request $request)
{
    $categorias = Categoria::orderBy('nombre')->get();

    $query = Producto::orderBy('id', 'DESC');

    // Filtro por categoría
    if ($request->filled('categoria')) {
        $query->where('id_categoria', $request->categoria);
    }

    // Filtro por nombre
    if ($request->filled('buscar')) {
        $query->where('nombre', 'like', '%' . $request->buscar . '%');
    }

    // Filtro por stock
    if ($request->filled('stock')) {
        if ($request->stock == 'disponible') {
            $query->where('stock', '>', 0);
        } elseif ($request->stock == 'agotado') {
            $query->where('stock', '<=', 0);
        }
    }

    $productos = $query->paginate(2)->withQueryString();

    return view('producto.index', compact('productos', 'categorias'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
       $categorias=Categoria::orderBy('id','DESC')
       ->select('categorias.id','categorias.nombre')
       ->get();
       return view('producto.create',compact('categorias'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoRequest $request)
    {
        //
        $request->validated();
     //procesar la imagen

        if($request->hasFile('imagen')){
            $imagen=$request->file('imagen');
            $nombreImagen=time().'.'.$imagen->getClientOriginalExtension();
            $imagen->move(public_path('img'),$nombreImagen);
        }
        //asignacion masiva
        $data=$request->except('imagen');
        $data['imagen']=$nombreImagen;
       Producto::create($data);
       return redirect()->route('producto.index')->with('success','Producto agregado con exito');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
        $categorias=Categoria::orderBy('id','DESC')
       ->select('categorias.id','categorias.nombre')
       ->get();
       return view('producto.edit', compact('categorias', 'producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoRequest $request, Producto $producto)
{
    if($request->hasFile('imagen')){
        if($producto->imagen && file_exists(public_path('img/'.$producto->imagen))){
            unlink(public_path('img/'.$producto->imagen));
        }
        $imagen = $request->file('imagen');
        $nombreImagen = time().'.'.$imagen->getClientOriginalExtension();
        $imagen->move(public_path('img'), $nombreImagen);
    } else {
        $nombreImagen = $producto->imagen;
    }

    $data = $request->except('imagen');
    $data['imagen'] = $nombreImagen;
    $producto->update($data);

    return redirect()->route('producto.index')->with('success', 'Producto actualizado correctamente');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
        try{
            $producto->delete();
            return redirect()->route("producto.index")->with('success', 'Producto eliminado correctamente');
               }catch(QueryException $e){
                if($e->getCode()==="23000"){
                    return redirect()->back()->with('error', 'El producto no se puede eliminar por que esta asociado con otro registro');
                }
                return redirect()->back()->with('error inesperado');
               }
     }
}

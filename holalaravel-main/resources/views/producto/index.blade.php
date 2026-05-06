@extends("layouts.plantilla")
@section("titulomain")
Productos
@endsection
@section('contenido')
 
@if(session('error'))
    <div class="alert alert-error">⚠️ {{ session('error') }}</div>
@endif
@if(session('success'))
    <div class="alert alert-success">✓ {{ session('success') }}</div>
@endif
 
<section class="container-tabla">
    <h2 class="titulo-tabla">Listado de productos</h2>
 
    <div class="barra-acciones">
        <form method="GET" action="{{ route('producto.index') }}" class="form-filtros">
            <select name="categoria" class="filtro-select">
                <option value="">Categoría</option>
                @foreach ($categorias as $cat)
                    <option value="{{ $cat->id }}" {{ request('categoria') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nombre }}
                    </option>
                @endforeach
            </select>
 
            <select name="stock" class="filtro-select">
                <option value="">Stock</option>
                <option value="disponible" {{ request('stock') == 'disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="agotado" {{ request('stock') == 'agotado' ? 'selected' : '' }}>Agotado</option>
            </select>
 
            <input type="text" name="buscar" class="filtro-input"
                placeholder="Buscar producto..."
                value="{{ request('buscar') }}">
 
            <button type="submit" class="nav-link btn-filtrar">Filtrar</button>
            <a href="{{ route('producto.index') }}" class="nav-link btn-limpiar">Limpiar</a>
        </form>
 
        @can('venta.create')
            <a href="{{ route('ventas.registrar') }}" class="nav-link btn-venta">Registrar Venta</a>
        @endcan
 
        <nav class="nav-acciones">
            @can('producto.create')
                <a href="{{ route('producto.create') }}" class="nav-link btn-agregar">Agregar Producto</a>
            @endcan
            <a href="{{ route('producto.pdf') }}" class="nav-link btn-pdf">Generar PDF</a>
        </nav>
    </div>
 
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Precio de venta</th>
                <th>Stock</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="tabla-productos">
            @foreach ($productos as $producto)
            <tr>
                <td data-label="ID">{{ $producto->id }}</td>
                <td data-label="Nombre">{{ $producto->nombre }}</td>
                <td data-label="Imagen">
                    <img src="{{ asset('img/'.$producto->imagen) }}" alt="{{ $producto->nombre }}">
                </td>
                <td data-label="Categoría">
                    {{ $producto->categoria ? $producto->categoria->nombre : 'Sin categoría' }}
                </td>
                <td data-label="Precio">${{ number_format($producto->precio, 2) }}</td>
                <td data-label="Precio venta">${{ number_format($producto->precio_venta, 2) }}</td>
                <td data-label="Stock">
                    @if($producto->stock == 0)
                        <span class="badge badge-red">Agotado</span>
                    @elseif($producto->stock < 5)
                        <span class="badge badge-yellow">{{ $producto->stock }}</span>
                    @else
                        <span class="badge badge-green">{{ $producto->stock }}</span>
                    @endif
                </td>
                <td data-label="Opciones">
                    <div class="opciones-cell">
                        <a href="{{ route('producto.show', $producto) }}">
                            <img src="img/view.png" alt="Ver">
                        </a>
                        @can('producto.update')
                        <a href="{{ route('producto.edit', $producto) }}">
                            <img src="img/edit.png" alt="Editar">
                        </a>
                        @endcan
                        @can('producto.destroy')
                        <form action="{{ route('producto.destroy', $producto) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confimarEliminacion()"
                                style="background:none; border:none; cursor:pointer; padding:0;">
                                <img src="img/delete.png" alt="Eliminar">
                            </button>
                        </form>
                        @endcan
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
 
    <div class="nav-botones">
        {{ $productos->links() }}
    </div>
</section>
 
<script>
    function confimarEliminacion() {
        return confirm('¿Seguro deseas eliminar este producto?');
    }
</script>
 
@endsection

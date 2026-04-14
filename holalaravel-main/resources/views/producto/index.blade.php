@extends("layouts.plantilla")
@section("titulomain")
Productos
@endsection
@section('contenido')

<section class="container-tabla">
    <h2 class="titulo-tabla">Listado de productos</h2>

    {{-- FILTROS Y BOTONES EN UNA MISMA FILA --}}
    <div class="barra-acciones">

        <form method="GET" action="{{ route('producto.index') }}" class="form-filtros">
            <select name="categoria" class="filtro-select">
                <option value="">Categoría</option>
                @foreach ($categorias as $cat)
                    <option value="{{ $cat->id }}"
                        {{ request('categoria') == $cat->id ? 'selected' : '' }}>
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
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>
                    <img src="{{ asset('img/'.$producto->imagen) }}" alt="{{ $producto->imagen }}">
                </td>
                <td>
                    {{ $producto->categoria ? $producto->categoria->nombre : 'Sin categoría' }}
                </td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->precio_venta }}</td>
                <td>{{ $producto->stock }}</td>
                <td>
                    <a href="{{ route('producto.show', $producto) }}">
                        <img src="img/view.png" alt="">
                    </a>
                    <a href="{{ route('producto.edit', $producto) }}">
                        <img src="img/edit.png" alt="">
                    </a>
                    <form action="{{ route('producto.destroy', $producto) }}" method="POST"
                        onsubmit="return confimarEliminacion()">
                        @csrf
                        @method('DELETE')
                        <input type="image" src="img/delete.png">
                    </form>
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
        return confirm('¿Seguro deseas eliminar?');
    }
</script>

@endsection
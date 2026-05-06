@extends("layouts.plantilla")
@section("titulomain")
Categorias
@endsection
@section('contenido')
 
@if(session('error'))
    <div class="alert alert-error">⚠️ {{ session('error') }}</div>
@endif
@if(session('success'))
    <div class="alert alert-success">✓ {{ session('success') }}</div>
@endif
 
<section class="container-tabla">
    <h2 class="titulo-tabla">Categorías</h2>
 
    <div class="barra-acciones">
        <nav class="nav-acciones" style="margin-left:auto;">
            @can('categoria.create')
                <a href="{{ route('categoria.create') }}" class="nav-link btn-agregar">Agregar Categoría</a>
            @endcan
        </nav>
    </div>
 
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Status</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="tabla-categorias">
            @foreach ($categorias as $categoria)
            <tr>
                <td data-label="ID">{{ $categoria->id }}</td>
                <td data-label="Nombre">{{ $categoria->nombre }}</td>
                <td data-label="Descripción">{{ $categoria->descripcion }}</td>
                <td data-label="Status">
                    @if($categoria->status == 1 || $categoria->status === 'activo')
                        <span class="badge badge-green">Activo</span>
                    @else
                        <span class="badge badge-red">Inactivo</span>
                    @endif
                </td>
                <td data-label="Opciones">
                    <div class="opciones-cell">
                        <a href="{{ route('categoria.show', $categoria) }}">
                            <img src="img/view.png" alt="Ver">
                        </a>
                        @can('categoria.update')
                        <a href="{{ route('categoria.edit', $categoria) }}">
                            <img src="img/edit.png" alt="Editar">
                        </a>
                        @endcan
                        @can('categoria.destroy')
                        <form action="{{ route('categoria.destroy', $categoria) }}" method="POST" style="display:inline;">
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
        {{ $categorias->links() }}
    </div>
</section>
 
<script>
    function confimarEliminacion() {
        return confirm('¿Seguro deseas eliminar esta categoría?');
    }
</script>
 
@endsection

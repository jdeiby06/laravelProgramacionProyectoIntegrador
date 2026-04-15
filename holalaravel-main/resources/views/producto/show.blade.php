@extends('layouts.plantilla')

@section('contenido')
<div class="container">
    <div class="card">
        <h2>{{ $producto->nombre }}</h2>

        <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
        <p><strong>Precio:</strong> {{ $producto->precio }}</p>
        <p><strong>Precio Venta:</strong> {{ $producto->precio_venta }}</p>
        <p><strong>Stock:</strong> {{ $producto->stock }}</p>

        <p><strong>Categoría:</strong> 
            {{ $producto->categoria ? $producto->categoria->nombre : 'Sin categoría' }}
        </p>

        @if($producto->imagen)
            <div>
                <img src="{{ asset('img/'.$producto->imagen) }}" width="200">
            </div>
        @endif

        <br>
        <a href="{{ route('producto.index') }}">Volver</a>
    </div>
</div>
@endsection
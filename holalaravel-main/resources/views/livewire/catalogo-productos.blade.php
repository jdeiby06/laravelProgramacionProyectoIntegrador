
<div>  
    <input 
        type="text" 
        wire:model.lazy="search" 
        placeholder="Buscar Producto..." 
        class="producto-search"  {{-- ✅ class adentro de las comillas --}}
    >

    <div class="productos-grid">
        @foreach($productos as $producto)
            <div class="producto">
                <img src="{{ asset('img/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">  {{-- ✅ src corregido --}}
                <h3>{{ $producto->nombre }}</h3>
                <p>Precio: ${{ $producto->precio_venta }}</p>
            </div>
        @endforeach

        @if($productos->isEmpty())
            <p>No se encontraron productos.</p>
        @endif
    </div>

</div>
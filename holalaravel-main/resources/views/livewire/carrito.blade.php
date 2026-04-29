<div class="carrito-flotante">
    <h3>Carrito</h3>
    @forelse($productos as $item)

    <div class="producto-carrito">
    <img src="{{ asset('img/' . $item['producto']->imagen) }}" alt="{{ $item['producto']->nombre }}">
    <div class="producto-info">
        <p><strong>{{ $item['producto']->nombre }}</strong></p>
        <p>Cantidad: {{ $item['cantidad'] }}</p>
        <p>Subtotal: ${{ number_format($item['producto']->precio * $item['cantidad'], 2) }}</p>
    </div>

    </div>
    @empty
    <p>No hay productos en el carrito</p>
    @endforelse
    @if(count($productos)>0)
    <p class="total">Total: ${{ number_format($totalVenta, 2) }}</p>
    <button wire:click="vaciarCarrito" class="btn-vaciar">Vaciar carrito</button>
    
      <form method="POST" action="{{ route('ventas.store') }}">
            @csrf            
            <button type="submit" class="btn-finalizar">Finalizar Compra</button>
        </form>
    

    @endif
</div>
 
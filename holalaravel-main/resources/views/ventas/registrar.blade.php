<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/dashboard-ventas.css') }}">
    <x-slot name="header">
        <h2 style="font-family:'Outfit',sans-serif; font-weight:600; font-size:18px; color:#1a1830;">Registrar Venta</h2>
    </x-slot>

    <div class="venta-wrapper">

        {{-- Alertas --}}
        @if(session('success'))
            <div class="alert alert-success">✓ {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">✕ {{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-error">✕ {{ $errors->first() }}</div>
        @endif

        <div class="venta-panel">

            {{-- Header del panel --}}
            <div class="venta-panel-header">
                <h2>Registrar Venta</h2>
                <p>Selecciona los productos y cantidades a vender</p>
            </div>

            <div class="venta-panel-body">

                {{-- Tabla de productos --}}
                <div style="overflow-x:auto;">
                    <table class="venta-table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Stock disponible</th>
                                <th>Precio de venta</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                            <tr>
                                <td class="product-name">{{ $producto->nombre }}</td>
                                <td class="stock-cell {{ $producto->stock < 5 ? 'low' : '' }}">
                                    {{ $producto->stock }}
                                    @if($producto->stock < 5)
                                        <span class="badge badge-yellow" style="margin-left:6px;">Bajo</span>
                                    @endif
                                </td>
                                <td>${{ number_format($producto->precio_venta, 2) }}</td>
                                <td>
                                    <input
                                        type="number"
                                        class="qty-input cantidad-input"
                                        min="0"
                                        max="{{ $producto->stock }}"
                                        value="0"
                                        data-id="{{ $producto->id }}"
                                        data-precio="{{ $producto->precio_venta }}"
                                        data-nombre="{{ $producto->nombre }}"
                                    >
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Resumen --}}
                <div class="venta-resumen">
                    <h4>Resumen de venta</h4>
                    <div id="resumen" class="resumen-items">
                        <span style="color:#9896b0; font-style:italic;">Sin productos seleccionados</span>
                    </div>
                    <div class="venta-total">
                        <span>Total</span>
                        <span class="total-amount">$<span id="total">0.00</span></span>
                    </div>
                </div>

                {{-- Formulario --}}
                <form method="POST" action="{{ route('ventas.store') }}" id="form-venta">
                    @csrf
                    <input type="hidden" name="items" id="items-input" value="[]">
                    <button type="submit" class="btn-registrar">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M5 13l4 4L19 7"/>
                        </svg>
                        Registrar Venta
                    </button>
                </form>

            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('form-venta');
        const itemsInput = document.getElementById('items-input');
        const resumenDiv = document.getElementById('resumen');
        const totalSpan = document.getElementById('total');

        function getItems() {
            const inputs = document.querySelectorAll('.cantidad-input');
            let items = [];
            let total = 0;
            let html = '';

            inputs.forEach(function(input) {
                const cant = parseInt(input.value) || 0;
                if (cant > 0) {
                    const precio = parseFloat(input.dataset.precio);
                    const subtotal = cant * precio;
                    total += subtotal;
                    html += '<div class="resumen-row"><span>' + input.dataset.nombre + ' × ' + cant + '</span><span>$' + subtotal.toFixed(2) + '</span></div>';
                    items.push({ producto_id: input.dataset.id, cantidad: cant });
                }
            });

            resumenDiv.innerHTML = html || '<span style="color:#9896b0; font-style:italic;">Sin productos seleccionados</span>';
            totalSpan.textContent = total.toFixed(2);
            return items;
        }

        document.querySelectorAll('.cantidad-input').forEach(function(input) {
            input.addEventListener('input', function() { getItems(); });
        });

        form.addEventListener('submit', function(e) {
            const items = getItems();
            if (items.length === 0) {
                e.preventDefault();
                alert('Selecciona al menos un producto.');
                return;
            }
            itemsInput.value = JSON.stringify(items);
        });
    });
    </script>

</x-app-layout>
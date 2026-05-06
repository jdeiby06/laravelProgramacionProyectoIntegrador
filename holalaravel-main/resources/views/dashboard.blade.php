<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/dashboard-ventas.css') }}">
    <x-slot name="header">
        <h2 style="font-family:'Outfit',sans-serif; font-weight:600; font-size:18px; color:#1a1830;">Dashboard</h2>
    </x-slot>

    <div class="dashboard-wrapper">

        {{-- Tarjetas --}}
        <div class="stats-grid">
            <div class="stat-card purple">
                <p class="stat-label">Total Productos</p>
                <p class="stat-value">{{ $totalProductos }}</p>
                <a href="{{ route('producto.index') }}" class="stat-link">Ver productos →</a>
            </div>
            <div class="stat-card teal">
                <p class="stat-label">Total Categorías</p>
                <p class="stat-value">{{ $totalCategorias }}</p>
                <a href="{{ route('categoria.index') }}" class="stat-link">Ver categorías →</a>
            </div>
            <div class="stat-card red">
                <p class="stat-label">Sin Stock</p>
                <p class="stat-value">{{ $sinStock }}</p>
                <a href="{{ route('producto.index', ['stock' => 'agotado']) }}" class="stat-link">Ver agotados →</a>
            </div>
            <div class="stat-card green">
                <p class="stat-label">Usuario</p>
                <p class="stat-value" style="font-size:1.3rem;">{{ auth()->user()->name }}</p>
                <span class="stat-link" style="cursor:default; opacity:.6;">{{ auth()->user()->email }}</span>
            </div>
        </div>

        {{-- Stock bajo --}}
        @if($stockBajo->count())
        <div class="panel">
            <div class="panel-header">
                <h3 class="panel-title">⚠️ Productos con stock bajo <span style="font-weight:400; color:#9896b0;">(menos de 5)</span></h3>
            </div>
            <table class="inv-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stockBajo as $p)
                    <tr>
                        <td data-label="Nombre">{{ $p->nombre }}</td>
                        <td data-label="Categoría">{{ $p->categoria->nombre ?? 'Sin categoría' }}</td>
                        <td data-label="Stock">
                            @if($p->stock == 0)
                                <span class="badge badge-red">Agotado</span>
                            @else
                                <span class="badge badge-yellow">{{ $p->stock }}</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        {{-- Movimientos --}}
        <div class="panel">
            <div class="panel-header">
                <h3 class="panel-title">📦 Historial de movimientos de stock</h3>
            </div>
            <table class="inv-table">
                <thead>
                    <tr>
                        <th>
                            Fecha y hora
                            <span class="sort-arrows">
                                <a href="{{ request()->fullUrlWithQuery(['orden' => 'asc', 'page' => 1]) }}"
                                   title="Más antiguo primero"
                                   class="{{ $orden === 'asc' ? 'active' : '' }}">▲</a>
                                <a href="{{ request()->fullUrlWithQuery(['orden' => 'desc', 'page' => 1]) }}"
                                   title="Más reciente primero"
                                   class="{{ $orden === 'desc' ? 'active' : '' }}">▼</a>
                            </span>
                        </th>
                        <th>Producto</th>
                        <th>Stock anterior</th>
                        <th>Stock nuevo</th>
                        <th>Usuario</th>
                        <th>Motivo</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($movimientos as $mov)
                    <tr>
                        <td data-label="Fecha">{{ $mov->created_at->format('d/m/Y H:i') }}</td>
                        <td data-label="Producto">{{ $mov->producto->nombre ?? 'N/A' }}</td>
                        <td data-label="Stock anterior">{{ $mov->cantidad_anterior }}</td>
                        <td data-label="Stock nuevo">
                            <span class="{{ $mov->cantidad_nueva > $mov->cantidad_anterior ? 'stock-up' : 'stock-down' }}">
                                {{ $mov->cantidad_nueva }}
                                {{ $mov->cantidad_nueva > $mov->cantidad_anterior ? '▲' : '▼' }}
                            </span>
                        </td>
                        <td data-label="Usuario">{{ $mov->usuario->name ?? 'N/A' }}</td>
                        <td data-label="Motivo">
                            <span class="badge {{ $mov->motivo === 'venta registrada' ? 'badge-red' : 'badge-purple' }}">
                                {{ $mov->motivo }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align:center; padding:2rem; color:#9896b0;">
                            Sin movimientos registrados
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="pagination-wrapper">
                {{ $movimientos->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
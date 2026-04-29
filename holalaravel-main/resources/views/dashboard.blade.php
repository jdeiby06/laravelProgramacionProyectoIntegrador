<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Tarjetas resumen --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-white rounded-lg shadow p-5 border-l-4 border-purple-500">
                    <p class="text-sm text-gray-500">Total Productos</p>
                    <p class="text-3xl font-bold text-purple-600">{{ $totalProductos }}</p>
                    <a href="{{ route('producto.index') }}" class="text-sm text-purple-400">Ver productos →</a>
                </div>
                <div class="bg-white rounded-lg shadow p-5 border-l-4 border-teal-500">
                    <p class="text-sm text-gray-500">Total Categorías</p>
                    <p class="text-3xl font-bold text-teal-600">{{ $totalCategorias }}</p>
                </div>
                <div class="bg-white rounded-lg shadow p-5 border-l-4 border-red-500">
                    <p class="text-sm text-gray-500">Sin Stock</p>
                    <p class="text-3xl font-bold text-red-600">{{ $sinStock }}</p>
                </div>
            </div>

            {{-- Stock bajo --}}
            @if($stockBajo->count())
            <div class="bg-white rounded-lg shadow p-5">
                <h3 class="font-semibold text-gray-700 mb-3">⚠️ Productos con stock bajo (menos de 5)</h3>
                <table class="w-full text-sm">
                    <thead class="bg-purple-50 text-gray-600">
                        <tr>
                            <th class="text-left p-2">Nombre</th>
                            <th class="text-left p-2">Categoría</th>
                            <th class="text-left p-2">Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stockBajo as $p)
                        <tr class="border-t">
                            <td class="p-2">{{ $p->nombre }}</td>
                            <td class="p-2">{{ $p->categoria->nombre ?? 'Sin categoría' }}</td>
                            <td class="p-2">
                                <span class="bg-yellow-400 text-white text-xs px-2 py-1 rounded-full">{{ $p->stock }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif

            {{-- Historial de movimientos --}}
            <div class="bg-white rounded-lg shadow p-5">
                <h3 class="font-semibold text-gray-700 mb-3">📦 Últimas entradas/salidas de productos</h3>
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 text-gray-600">
                        <tr>
                            <th class="text-left p-2">Fecha</th>
                            <th class="text-left p-2">Producto</th>
                            <th class="text-left p-2">Cantidad</th>
                            <th class="text-left p-2">Usuario</th>
                            <th class="text-left p-2">Estado venta</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($movimientos as $mov)
                        <tr class="border-t">
                            <td class="p-2 text-gray-500">{{ $mov->created_at->format('d/m/Y H:i') }}</td>
                            <td class="p-2">{{ $mov->producto->nombre ?? 'N/A' }}</td>
                            <td class="p-2">{{ $mov->cantidad }}</td>
                            <td class="p-2">{{ $mov->venta->cliente->name ?? 'N/A' }}</td>
                            <td class="p-2">
                                <span class="text-xs px-2 py-1 rounded-full
                                    {{ $mov->venta->estado === 'completado' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ ucfirst($mov->venta->estado ?? 'pendiente') }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="p-4 text-center text-gray-400">Sin movimientos registrados</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
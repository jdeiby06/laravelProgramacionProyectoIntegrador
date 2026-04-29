<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Tarjetas --}}
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                <div class="bg-white rounded-lg shadow p-5 border-l-4 border-purple-500">
                    <p class="text-sm text-gray-500">Total Productos</p>
                    <p class="text-3xl font-bold text-purple-600">{{ $totalProductos }}</p>
                    <a href="{{ route('producto.index') }}" class="text-sm text-purple-400">Ver productos →</a>
                </div>
                <div class="bg-white rounded-lg shadow p-5 border-l-4 border-teal-500">
                    <p class="text-sm text-gray-500">Total Categorías</p>
                    <p class="text-3xl font-bold text-teal-600">{{ $totalCategorias }}</p>
                    <a href="{{ route('categoria.index') }}" class="text-sm text-teal-400">Ver categorías →</a>
                </div>
                <div class="bg-white rounded-lg shadow p-5 border-l-4 border-red-500">
                    <p class="text-sm text-gray-500">Sin Stock</p>
                    <p class="text-3xl font-bold text-red-600">{{ $sinStock }}</p>
                    <a href="{{ route('producto.index', ['stock' => 'agotado']) }}" class="text-sm text-red-400">Ver agotados →</a>
                </div>
                <div class="bg-white rounded-lg shadow p-5 border-l-4 border-green-500">
                    <p class="text-sm text-gray-500">Usuario</p>
                    <p class="text-lg font-bold text-green-600">{{ auth()->user()->name }}</p>
                    <p class="text-sm text-gray-400">{{ auth()->user()->email }}</p>
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
                                @if($p->stock == 0)
                                    <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">Agotado</span>
                                @else
                                    <span class="bg-yellow-400 text-white text-xs px-2 py-1 rounded-full">{{ $p->stock }}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif

            {{-- Movimientos --}}
<div class="bg-white rounded-lg shadow p-5">
    <h3 class="font-semibold text-gray-700 mb-3">📦 Historial de movimientos de stock</h3>
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600">
            <tr>
                <th class="text-left p-2">
                    <div class="flex items-center gap-1">
                        Fecha y hora
                        <div class="flex flex-col leading-none">
                            <a href="{{ request()->fullUrlWithQuery(['orden' => 'asc', 'page' => 1]) }}"
                               title="Más nuevo primero"
                               class="text-xs {{ $orden === 'asc' ? 'text-gray-800 font-bold' : 'text-gray-400 hover:text-gray-600' }}">▲</a>
                            <a href="{{ request()->fullUrlWithQuery(['orden' => 'desc', 'page' => 1]) }}"
                               title="Más antiguo primero"
                               class="text-xs {{ $orden === 'desc' ? 'text-gray-800 font-bold' : 'text-gray-400 hover:text-gray-600' }}">▼</a>
                        </div>
                    </div>
                </th>
                <th class="text-left p-2">Producto</th>
                <th class="text-left p-2">Stock anterior</th>
                <th class="text-left p-2">Stock nuevo</th>
                <th class="text-left p-2">Usuario</th>
                <th class="text-left p-2">Motivo</th>
            </tr>
        </thead>
        <tbody>
            @forelse($movimientos as $mov)
            <tr class="border-t">
                <td class="p-2 text-gray-500">{{ $mov->created_at->format('d/m/Y H:i') }}</td>
                <td class="p-2">{{ $mov->producto->nombre ?? 'N/A' }}</td>
                <td class="p-2">{{ $mov->cantidad_anterior }}</td>
                <td class="p-2">
                    <span class="{{ $mov->cantidad_nueva > $mov->cantidad_anterior ? 'text-green-600' : 'text-red-600' }} font-semibold">
                        {{ $mov->cantidad_nueva }}
                        {{ $mov->cantidad_nueva > $mov->cantidad_anterior ? '▲' : '▼' }}
                    </span>
                </td>
                <td class="p-2">{{ $mov->usuario->name ?? 'N/A' }}</td>
                <td class="p-2 text-gray-500">{{ $mov->motivo }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="p-4 text-center text-gray-400">Sin movimientos registrados</td>
            </tr>
            @endforelse
        </tbody>
    </table>
     <div class="mt-4">
                {{ $movimientos->links() }}
            </div>
        </div>

        </div>
    </div>
</x-app-layout>
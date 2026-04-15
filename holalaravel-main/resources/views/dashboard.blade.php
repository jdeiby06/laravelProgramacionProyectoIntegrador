<x-app-layout>
    <x-slot name="header">
        <h2 style="color: rgba(129, 67, 191, 0.8); font-size: 20px; font-weight: 700;">
            Dashboard
        </h2>
    </x-slot>

    <div style="padding: 30px 20px;">
        <div style="max-width: 1200px; margin: auto;">

            {{-- Tarjetas de resumen --}}
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; margin-bottom: 30px;">

                {{-- Productos --}}
                <div style="background: white; border-radius: 12px; padding: 20px;
                    box-shadow: 0 4px 12px rgba(129, 67, 191, 0.1);
                    border-left: 4px solid rgba(129, 67, 191, 0.8);">
                    <p style="font-size: 13px; color: #999; margin-bottom: 6px;">Total Productos</p>
                    <h3 style="font-size: 28px; font-weight: 700; color: rgba(129, 67, 191, 0.8);">
                        {{ \App\Models\Producto::count() }}
                    </h3>
                    <a href="{{ route('producto.index') }}"
                        style="font-size: 12px; color: rgba(129, 67, 191, 0.8); text-decoration: none; margin-top: 8px; display: inline-block;">
                        Ver productos →
                    </a>
                </div>

                {{-- Categorías --}}
                <div style="background: white; border-radius: 12px; padding: 20px;
                    box-shadow: 0 4px 12px rgba(23, 162, 184, 0.15);
                    border-left: 4px solid #17a2b8;">
                    <p style="font-size: 13px; color: #999; margin-bottom: 6px;">Total Categorías</p>
                    <h3 style="font-size: 28px; font-weight: 700; color: #17a2b8;">
                        {{ \App\Models\Categoria::count() }}
                    </h3>
                    <a href="{{ route('categoria.index') }}"
                        style="font-size: 12px; color: #17a2b8; text-decoration: none; margin-top: 8px; display: inline-block;">
                        Ver categorías →
                    </a>
                </div>

                {{-- Stock agotado --}}
                <div style="background: white; border-radius: 12px; padding: 20px;
                    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.1);
                    border-left: 4px solid #dc3545;">
                    <p style="font-size: 13px; color: #999; margin-bottom: 6px;">Sin Stock</p>
                    <h3 style="font-size: 28px; font-weight: 700; color: #dc3545;">
                        {{ \App\Models\Producto::where('stock', '<=', 0)->count() }}
                    </h3>
                    <a href="{{ route('producto.index', ['stock' => 'agotado']) }}"
                        style="font-size: 12px; color: #dc3545; text-decoration: none; margin-top: 8px; display: inline-block;">
                        Ver agotados →
                    </a>
                </div>

                {{-- Usuario --}}
                <div style="background: white; border-radius: 12px; padding: 20px;
                    box-shadow: 0 4px 12px rgba(40, 167, 69, 0.1);
                    border-left: 4px solid #28a745;">
                    <p style="font-size: 13px; color: #999; margin-bottom: 6px;">Usuario</p>
                    <h3 style="font-size: 16px; font-weight: 700; color: #28a745; margin-top: 6px;">
                        {{ auth()->user()->name }}
                    </h3>
                    <p style="font-size: 12px; color: #999; margin-top: 4px;">
                        {{ auth()->user()->email }}
                    </p>
                </div>

            </div>

            {{-- Productos con poco stock --}}
            <div style="background: white; border-radius: 12px; padding: 20px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.06);">
                <h3 style="font-size: 16px; font-weight: 700; color: rgba(129, 67, 191, 0.8);
                    margin-bottom: 15px; padding-bottom: 10px;
                    border-bottom: 2px solid rgba(129, 67, 191, 0.15);">
                    ⚠️ Productos con stock bajo (menos de 5)
                </h3>
                <table style="width: 100%; border-collapse: collapse; font-size: 13px;">
                    <thead>
                        <tr style="background: rgba(129, 67, 191, 0.08);">
                            <th style="padding: 10px; text-align: left; color: rgba(129, 67, 191, 0.8);">Nombre</th>
                            <th style="padding: 10px; text-align: left; color: rgba(129, 67, 191, 0.8);">Categoría</th>
                            <th style="padding: 10px; text-align: left; color: rgba(129, 67, 191, 0.8);">Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (\App\Models\Producto::with('categoria')->where('stock', '<', 5)->orderBy('stock')->take(8)->get() as $producto)
                        <tr style="border-bottom: 1px solid #f0f0f0;">
                            <td style="padding: 10px;">{{ $producto->nombre }}</td>
                            <td style="padding: 10px; color: #999;">
                                {{ $producto->categoria ? $producto->categoria->nombre : 'Sin categoría' }}
                            </td>
                            <td style="padding: 10px;">
                                <span style="background: {{ $producto->stock <= 0 ? '#dc3545' : '#ffc107' }};
                                    color: white; padding: 3px 10px; border-radius: 20px; font-size: 12px;">
                                    {{ $producto->stock <= 0 ? 'Agotado' : $producto->stock }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" style="padding: 20px; text-align: center; color: #28a745;">
                                ✅ Todos los productos tienen stock suficiente
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: "Roboto", sans-serif;
            font-size: 13px;
            color: #1a1a1a;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #8143bf;
        }
        .header h1 {
            font-size: 22px;
            color: #8143bf;
        }
        .header p {
            font-size: 11px;
            color: #666;
            margin-top: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        thead tr {
            background-color: #8143bf;
            color: white;
        }
        th {
            padding: 8px 10px;
            text-align: left;
            font-size: 12px;
        }
        td {
            padding: 7px 10px;
            border-bottom: 1px solid #e0e0e0;
            font-size: 12px;
        }
        tbody tr:nth-child(even) {
            background-color: #f5f0fb;
        }
        .stock-ok {
            color: #28a745;
            font-weight: bold;
        }
        .stock-agotado {
            color: #dc3545;
            font-weight: bold;
        }
        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 11px;
            color: #999;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Listado de Productos</h1>
        <p>Generado el {{ now()->format('d/m/Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Precio Venta</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->categoria ? $producto->categoria->nombre : 'Sin categoría' }}</td>
                <td>${{ number_format($producto->precio, 2) }}</td>
                <td>${{ number_format($producto->precio_venta, 2) }}</td>
                <td class="{{ $producto->stock > 0 ? 'stock-ok' : 'stock-agotado' }}">
                    {{ $producto->stock > 0 ? $producto->stock : 'Agotado' }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Total de productos: {{ count($productos) }}
    </div>

</body>
</html>
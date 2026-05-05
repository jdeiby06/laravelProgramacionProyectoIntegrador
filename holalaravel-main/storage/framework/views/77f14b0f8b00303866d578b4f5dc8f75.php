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
        <p>Generado el <?php echo e(now()->format('d/m/Y H:i')); ?></p>
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
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <tr>
                <td><?php echo e($producto->id); ?></td>
                <td><?php echo e($producto->nombre); ?></td>
                <td><?php echo e($producto->categoria ? $producto->categoria->nombre : 'Sin categoría'); ?></td>
                <td>$<?php echo e(number_format($producto->precio, 2)); ?></td>
                <td>$<?php echo e(number_format($producto->precio_venta, 2)); ?></td>
                <td class="<?php echo e($producto->stock > 0 ? 'stock-ok' : 'stock-agotado'); ?>">
                    <?php echo e($producto->stock > 0 ? $producto->stock : 'Agotado'); ?>

                </td>
            </tr>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </tbody>
    </table>

    <div class="footer">
        Total de productos: <?php echo e(count($productos)); ?>

    </div>

</body>
</html><?php /**PATH C:\Users\USUARIO\Downloads\laravelProgramacion3\holalaravel-main\resources\views/producto/pdf.blade.php ENDPATH**/ ?>
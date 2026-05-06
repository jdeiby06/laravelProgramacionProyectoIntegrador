
<?php $__env->startSection("titulomain"); ?>
Productos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
 
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
    <div class="alert alert-error">⚠️ <?php echo e(session('error')); ?></div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
    <div class="alert alert-success">✓ <?php echo e(session('success')); ?></div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
 
<section class="container-tabla">
    <h2 class="titulo-tabla">Listado de productos</h2>
 
    <div class="barra-acciones">
        <form method="GET" action="<?php echo e(route('producto.index')); ?>" class="form-filtros">
            <select name="categoria" class="filtro-select">
                <option value="">Categoría</option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <option value="<?php echo e($cat->id); ?>" <?php echo e(request('categoria') == $cat->id ? 'selected' : ''); ?>>
                        <?php echo e($cat->nombre); ?>

                    </option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </select>
 
            <select name="stock" class="filtro-select">
                <option value="">Stock</option>
                <option value="disponible" <?php echo e(request('stock') == 'disponible' ? 'selected' : ''); ?>>Disponible</option>
                <option value="agotado" <?php echo e(request('stock') == 'agotado' ? 'selected' : ''); ?>>Agotado</option>
            </select>
 
            <input type="text" name="buscar" class="filtro-input"
                placeholder="Buscar producto..."
                value="<?php echo e(request('buscar')); ?>">
 
            <button type="submit" class="nav-link btn-filtrar">Filtrar</button>
            <a href="<?php echo e(route('producto.index')); ?>" class="nav-link btn-limpiar">Limpiar</a>
        </form>
 
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('venta.create')): ?>
            <a href="<?php echo e(route('ventas.registrar')); ?>" class="nav-link btn-venta">Registrar Venta</a>
        <?php endif; ?>
 
        <nav class="nav-acciones">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('producto.create')): ?>
                <a href="<?php echo e(route('producto.create')); ?>" class="nav-link btn-agregar">Agregar Producto</a>
            <?php endif; ?>
            <a href="<?php echo e(route('producto.pdf')); ?>" class="nav-link btn-pdf">Generar PDF</a>
        </nav>
    </div>
 
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Precio de venta</th>
                <th>Stock</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="tabla-productos">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <tr>
                <td data-label="ID"><?php echo e($producto->id); ?></td>
                <td data-label="Nombre"><?php echo e($producto->nombre); ?></td>
                <td data-label="Imagen">
                    <img src="<?php echo e(asset('img/'.$producto->imagen)); ?>" alt="<?php echo e($producto->nombre); ?>">
                </td>
                <td data-label="Categoría">
                    <?php echo e($producto->categoria ? $producto->categoria->nombre : 'Sin categoría'); ?>

                </td>
                <td data-label="Precio">$<?php echo e(number_format($producto->precio, 2)); ?></td>
                <td data-label="Precio venta">$<?php echo e(number_format($producto->precio_venta, 2)); ?></td>
                <td data-label="Stock">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($producto->stock == 0): ?>
                        <span class="badge badge-red">Agotado</span>
                    <?php elseif($producto->stock < 5): ?>
                        <span class="badge badge-yellow"><?php echo e($producto->stock); ?></span>
                    <?php else: ?>
                        <span class="badge badge-green"><?php echo e($producto->stock); ?></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </td>
                <td data-label="Opciones">
                    <div class="opciones-cell">
                        <a href="<?php echo e(route('producto.show', $producto)); ?>">
                            <img src="img/view.png" alt="Ver">
                        </a>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('producto.update')): ?>
                        <a href="<?php echo e(route('producto.edit', $producto)); ?>">
                            <img src="img/edit.png" alt="Editar">
                        </a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('producto.destroy')): ?>
                        <form action="<?php echo e(route('producto.destroy', $producto)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" onclick="return confimarEliminacion()"
                                style="background:none; border:none; cursor:pointer; padding:0;">
                                <img src="img/delete.png" alt="Eliminar">
                            </button>
                        </form>
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </tbody>
    </table>
 
    <div class="nav-botones">
        <?php echo e($productos->links()); ?>

    </div>
</section>
 
<script>
    function confimarEliminacion() {
        return confirm('¿Seguro deseas eliminar este producto?');
    }
</script>
 
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.plantilla", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USUARIO\Downloads\laravelProgramacion3\holalaravel-main\resources\views/producto/index.blade.php ENDPATH**/ ?>
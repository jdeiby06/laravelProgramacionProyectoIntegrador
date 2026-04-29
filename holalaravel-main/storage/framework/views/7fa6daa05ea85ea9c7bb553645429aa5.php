
<?php $__env->startSection("titulomain"); ?>
Productos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>

<section class="container-tabla">
    <h2 class="titulo-tabla">Listado de productos</h2>

    
    <div class="barra-acciones">

        <form method="GET" action="<?php echo e(route('producto.index')); ?>" class="form-filtros">
            <select name="categoria" class="filtro-select">
                <option value="">Categoría</option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <option value="<?php echo e($cat->id); ?>"
                        <?php echo e(request('categoria') == $cat->id ? 'selected' : ''); ?>>
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
                <td><?php echo e($producto->id); ?></td>
                <td><?php echo e($producto->nombre); ?></td>
                <td>
                    <img src="<?php echo e(asset('img/'.$producto->imagen)); ?>" alt="<?php echo e($producto->imagen); ?>">
                </td>
                <td>
                    <?php echo e($producto->categoria ? $producto->categoria->nombre : 'Sin categoría'); ?>

                </td>
                <td><?php echo e($producto->precio); ?></td>
                <td><?php echo e($producto->precio_venta); ?></td>
                <td><?php echo e($producto->stock); ?></td>
                <td>
                    <a href="<?php echo e(route('producto.show', $producto)); ?>">
                        <img src="img/view.png" alt="">
                    </a>
                    <a href="<?php echo e(route('producto.edit', $producto)); ?>">
                        <img src="img/edit.png" alt="">
                    </a>
                    <form action="<?php echo e(route('producto.destroy', $producto)); ?>" method="POST"
                        onsubmit="return confimarEliminacion()">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <input type="image" src="img/delete.png">
                    </form>
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
        return confirm('¿Seguro deseas eliminar?');
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.plantilla", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USUARIO\Downloads\laravelProgramacion3\holalaravel-main\resources\views/producto/index.blade.php ENDPATH**/ ?>
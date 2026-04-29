<?php $__env->startSection('contenido'); ?>
<div class="container">
    <div class="card">
        <h2><?php echo e($producto->nombre); ?></h2>

        <p><strong>Descripción:</strong> <?php echo e($producto->descripcion); ?></p>
        <p><strong>Precio:</strong> <?php echo e($producto->precio); ?></p>
        <p><strong>Precio Venta:</strong> <?php echo e($producto->precio_venta); ?></p>
        <p><strong>Stock:</strong> <?php echo e($producto->stock); ?></p>

        <p><strong>Categoría:</strong> 
            <?php echo e($producto->categoria ? $producto->categoria->nombre : 'Sin categoría'); ?>

        </p>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($producto->imagen): ?>
            <div>
                <img src="<?php echo e(asset('img/'.$producto->imagen)); ?>" width="200">
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <br>
        <a href="<?php echo e(route('producto.index')); ?>">Volver</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USUARIO\Downloads\laravelProgramacion3\holalaravel-main\resources\views/producto/show.blade.php ENDPATH**/ ?>
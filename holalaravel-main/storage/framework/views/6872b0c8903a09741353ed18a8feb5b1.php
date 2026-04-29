<div class="carrito-flotante">
    <h3>Carrito</h3>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>

    <div class="producto-carrito">
    <img src="<?php echo e(asset('img/' . $item['producto']->imagen)); ?>" alt="<?php echo e($item['producto']->nombre); ?>">
    <div class="producto-info">
        <p><strong><?php echo e($item['producto']->nombre); ?></strong></p>
        <p>Cantidad: <?php echo e($item['cantidad']); ?></p>
        <p>Subtotal: $<?php echo e(number_format($item['producto']->precio * $item['cantidad'], 2)); ?></p>
    </div>

    </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    <p>No hay productos en el carrito</p>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($productos)>0): ?>
    <p class="total">Total: $<?php echo e(number_format($totalVenta, 2)); ?></p>
    <button wire:click="vaciarCarrito" class="btn-vaciar">Vaciar carrito</button>
    
      <form method="POST" action="<?php echo e(route('ventas.store')); ?>">
            <?php echo csrf_field(); ?>            
            <button type="submit" class="btn-finalizar">Finalizar Compra</button>
        </form>
    

    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
 <?php /**PATH C:\Users\USUARIO\Downloads\laravelProgramacion3\holalaravel-main\resources\views/livewire/carrito.blade.php ENDPATH**/ ?>
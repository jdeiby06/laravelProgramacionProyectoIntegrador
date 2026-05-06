

  
<div>
   <div class="productosearch">
    <input type="text" wire:model.lazy="search" placeholder="Buscar producto..." class="search" id="searchInput">
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($search): ?>
        <span wire:click="$set('search', '')"
            onclick="document.getElementById('searchInput').value=''"
            class="clear-icon" 
            style="cursor:pointer;">✕</span>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?> 

   </div>
       <div class="productos-grid" >
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <div class="producto"  <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'producto-'.e($producto->id).''; ?>wire:key="producto-<?php echo e($producto->id); ?>">
            <img src="<?php echo e(asset('img/'.$producto->imagen)); ?>" alt="<?php echo e($producto->imagen); ?>" >
            <h3><?php echo e($producto->nombre); ?></h3>
            <p>Precio: $<?php echo e($producto->precio_venta); ?></p>

            <button wire:click="addToCart(<?php echo e($producto->id); ?>)"class="btn-agregar-carrito">Comprar🛒</button>
        </div>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

     <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($productos->isEmpty()): ?>
        <p>No se encontraron productos.</p>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?> 

</div>
 <div class="mt-4">
    
  <?php echo e($productos->links('vendor.livewire.tailwind', ['scrollTo' => '#productos'])); ?>


  </div>
</div>
<?php /**PATH C:\Users\USUARIO\Downloads\laravelProgramacion3\holalaravel-main\resources\views/livewire/catalogo-productos.blade.php ENDPATH**/ ?>
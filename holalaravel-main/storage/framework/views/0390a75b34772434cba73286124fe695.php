

<?php $__env->startSection('contenido'); ?>
<div class= "container-formulario">
<div class="card formulario">
    <h2>Editar Producto</h2>
    <form action="<?php echo e(route('producto.update',$producto)); ?>" enctype="multipart/form-data" method="POST">
        
        <?php echo csrf_field(); ?>
        
        <?php echo method_field('PATCH'); ?>
        <!-- Campo Nombre -->
        <div class="form-group">
            <label for="nombre">Nombre de la Producto</label>
            <input type="text" id="nombre" name="nombre"  required value=<?php echo e($producto->nombre); ?>>
        </div>
        <!-- Campo Descripción -->
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="4" ><?php echo e($producto->descripcion); ?></textarea>
        </div>
        
        <!-- Campo Precio -->
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" required value=<?php echo e($producto->precio); ?>>
        </div>
         <!-- Campo Precio Venta -->
         <div class="form-group">
            <label for="precio_venta">Precio de Venta</label>
            <input type="number" id="precio_venta" name="precio_venta" required value=<?php echo e($producto->precio_venta); ?>>
        </div>
         <!-- Campo Stock-->
         <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" required value=<?php echo e($producto->stock); ?>>
        </div>
        <!-- Campo imagen -->
        <div class="form-group">
            <label for="imagen">Imagen</label>
           <input type="file" id="imagen" name= "imagen">
        </div>
        <!-- Campo Categoria -->
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select name='id_categoria'id="id_categoria"required>
                <option value=<?php echo e($producto->id_categoria); ?>  selected><?php echo e($producto->categoria ? $producto->categoria->nombre : 'Sin categoría'); ?></option>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                 <option value=<?php echo e($cat->id); ?>> <?php echo e($cat->nombre); ?></option>
               <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
             </select>
        </div>
        <!-- Botón Guardar -->
        <div class="form-group">
            <button type="submit">Guardar Producto</button>
        </div>
    </form>
     
       <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="alert alert-danger">
         <ul>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <li><?php echo e($error); ?></li>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </ul>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USUARIO\Downloads\laravelProgramacion3\holalaravel-main\resources\views/producto/edit.blade.php ENDPATH**/ ?>


<?php $__env->startSection('titulomain'); ?>
<a href="<?php echo e(route('categoria.index')); ?>">Categorías</a> / 
<span>Editar <?php echo e($categoria->nombre); ?></span>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>

<div class= "container-formulario">
    <div class="card formulario">
        <h2>Editar Categoría</h2>
        <form action="<?php echo e(route('categoria.update',$categoria->id)); ?>" method="POST">
            
            <?php echo csrf_field(); ?>
    
            
            <?php echo method_field('PATCH'); ?>
            <!-- Campo Nombre -->
            <div class="form-group">
                <label for="nombre">Nombre de la Categoría</label>
                <input type="text" id="nombre" name="nombre" required value=<?php echo e($categoria->nombre); ?> class="form-control <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        value="<?php echo e(old('nombre')); ?>">
            </div>
            <!-- Campo Descripción -->
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4"
               ><?php echo e($categoria->descripcion); ?></textarea>
            </div>
            <!-- Campo Status -->
            <div class="form-group">
                <label for="status">Estado</label>
                <select id="status" name="status" required >
                    <option value="1" <?php echo e($categoria->status == 1 ? 'selected' : ''); ?>>Activo</option>
                    <option value="0" <?php echo e($categoria->status == 0 ? 'selected' : ''); ?>>Inactivo</option>
                </select>
            </div>
            <!-- Botón Guardar -->
            <div class="form-group">
                <button type="submit">Actualizar Categoría</button>
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
<?php echo $__env->make('layouts.plantilla', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USUARIO\Downloads\laravelProgramacion3\holalaravel-main\resources\views/categoria/edit.blade.php ENDPATH**/ ?>
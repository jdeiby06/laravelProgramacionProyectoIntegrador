

<?php $__env->startSection("titulomain"); ?>
<a href="<?php echo e(route("categoria.index")); ?>">Categorias</a>
<span>/agregar</span>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("contenido"); ?>
 
  <div class= "container-formulario">
    <div class="card formulario">
        <h2>Crear Nueva Categoría</h2>
        <form action="<?php echo e(route('categoria.store')); ?>" method="POST">
            
            <?php echo csrf_field(); ?>
            <!-- Campo Nombre -->
            <div class="form-group">
                <label for="nombre">Nombre de la Categoría</label>
                <input type="text" id="nombre" name="nombre" required  class="form-control">
            </div>
            <!-- Campo Descripción -->
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4"></textarea>
            </div>
            <!-- Campo Status -->
            <div class="form-group">
                <label for="status">Estado</label>
                <select id="status" name="status" required>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
            <!-- Botón Guardar -->
            <div class="form-group">
                <button type="submit">Guardar Categoría</button>
            </div>
        </form>
        
       <?php if($errors->any()): ?>
        <div class="alert alert-danger">
         <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        </div>
        <?php endif; ?>
    </div>
    
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.plantilla", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USUARIO\Downloads\laravelProgramacion3\holalaravel-main\resources\views/categoria/create.blade.php ENDPATH**/ ?>
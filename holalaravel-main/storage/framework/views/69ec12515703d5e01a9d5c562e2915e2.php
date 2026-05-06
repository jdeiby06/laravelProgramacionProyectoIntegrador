
<?php $__env->startSection("titulomain"); ?>
Categorias
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
 
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
    <div class="alert alert-error">⚠️ <?php echo e(session('error')); ?></div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
    <div class="alert alert-success">✓ <?php echo e(session('success')); ?></div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
 
<section class="container-tabla">
    <h2 class="titulo-tabla">Categorías</h2>
 
    <div class="barra-acciones">
        <nav class="nav-acciones" style="margin-left:auto;">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categoria.create')): ?>
                <a href="<?php echo e(route('categoria.create')); ?>" class="nav-link btn-agregar">Agregar Categoría</a>
            <?php endif; ?>
        </nav>
    </div>
 
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Status</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="tabla-categorias">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <tr>
                <td data-label="ID"><?php echo e($categoria->id); ?></td>
                <td data-label="Nombre"><?php echo e($categoria->nombre); ?></td>
                <td data-label="Descripción"><?php echo e($categoria->descripcion); ?></td>
                <td data-label="Status">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($categoria->status == 1 || $categoria->status === 'activo'): ?>
                        <span class="badge badge-green">Activo</span>
                    <?php else: ?>
                        <span class="badge badge-red">Inactivo</span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </td>
                <td data-label="Opciones">
                    <div class="opciones-cell">
                        <a href="<?php echo e(route('categoria.show', $categoria)); ?>">
                            <img src="img/view.png" alt="Ver">
                        </a>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categoria.update')): ?>
                        <a href="<?php echo e(route('categoria.edit', $categoria)); ?>">
                            <img src="img/edit.png" alt="Editar">
                        </a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categoria.destroy')): ?>
                        <form action="<?php echo e(route('categoria.destroy', $categoria)); ?>" method="POST" style="display:inline;">
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
        <?php echo e($categorias->links()); ?>

    </div>
</section>
 
<script>
    function confimarEliminacion() {
        return confirm('¿Seguro deseas eliminar esta categoría?');
    }
</script>
 
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.plantilla", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USUARIO\Downloads\laravelProgramacion3\holalaravel-main\resources\views/categoria/index.blade.php ENDPATH**/ ?>


<?php $__env->startSection("titulomain"); ?>
Categorias
<?php $__env->stopSection(); ?>

<?php $__env->startSection("contenido"); ?>

<?php if(session('error')): ?>
<div>
    <?php echo e(session('error')); ?>

</div>
<?php endif; ?>

<section class="container-tabla">
    <h2 class="titulo-tabla"> Categorias</h2>

    <nav class="nav-botones">
        <ul class="nav-menu">      
      
            <li class="nav-item">
                <a href="<?php echo e(route('categoria.create')); ?>" class="nav-link btn-agregar">Agregar Categoria</a>
            </li>      
         
        </ul>
    </nav>
    
    <table >
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Status</th>               
                <th>Opciones</th>
            </tr>
        </thead>
       <tbody class="tabla-categorias">

    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr>
         <td><?php echo e($categoria->id); ?></td>
         <td><?php echo e($categoria->nombre); ?></td>
         <td><?php echo e($categoria->descripcion); ?></td>
         <td><?php echo e($categoria->status); ?></td>
         
            <td >
                <a href="<?php echo e(route('categoria.show',$categoria)); ?>">
                   <img src="img/view.png" alt=""> 
                </a>

             
                      
                 
                   <a href="<?php echo e(route('categoria.edit',$categoria)); ?>">
                   <img src="img/edit.png" alt="">
                   </a>
                             
                                        
               
                    <form action="<?php echo e(route('categoria.destroy',$categoria)); ?>" method="POST" onsubmit="return confimarEliminacion()">

                    
                    <?php echo csrf_field(); ?>
                    
                    <?php echo method_field('DELETE'); ?>
                    <input type="image"src="img/delete.png"></input>

                     </form>
               
                 <script>
                    function confimarEliminacion() {
                        return confirm('¿Seguro deseas eliminar?'); // Muestra el mensaje de confirmación
                    }
                </script>
         </td>
       </tr>
           
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

       </tbody>

    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.plantilla", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USUARIO\Downloads\laravelProgramacion3\holalaravel-main\resources\views/categoria/index.blade.php ENDPATH**/ ?>
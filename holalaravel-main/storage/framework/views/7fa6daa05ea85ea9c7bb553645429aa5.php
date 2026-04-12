

<?php $__env->startSection("titulomain"); ?>
Productos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenido'); ?>
    
<form method="GET" action="<?php echo e(route('producto.index')); ?>">
    <select name="categoria" onchange="this.form.submit()">
        <option value="">Todas las categorías</option>
        <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($cat->id); ?>"
                <?php echo e(request('categoria') == $cat->id ? 'selected' : ''); ?>>
                <?php echo e($cat->nombre); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</form>

<section class="container-tabla">
   <h2 class="titulo-tabla"> Listado de productos</h2>
   
 <nav class="nav-botones">
               
        <ul class="nav-menu">
            
            <li class="nav-item">
                <a href="<?php echo e(route('producto.create')); ?>" class="nav-link btn-agregar">Agregar Producto</a>
            </li>
            

        </ul>
    </nav>
  
   <table >
    
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
       <tbody class ="tabla-productos">
         <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>                
             <td><?php echo e($producto->id); ?></td>
             <td><?php echo e($producto->nombre); ?></td>
             <td >
               <img src="<?php echo e(asset('img/'.$producto->imagen)); ?>"  alt="<?php echo e($producto->imagen); ?>">

             </td>
             <td> 
               <?php if($producto->categoria): ?>
               <?php echo e($producto->categoria->nombre); ?>

               <?php else: ?>
               Sin categoría
               <?php endif; ?>
             </td>
             <td><?php echo e($producto->precio); ?></td>
             <td><?php echo e($producto->precio_venta); ?></td>
             <td><?php echo e($producto->stock); ?></td>
             <td >
              <a href="<?php echo e(route('producto.show',$producto)); ?>">
                 <img src="img/view.png" alt="">
              </a>
              <a href="<?php echo e(route('producto.edit',$producto)); ?>">
                 <img src="img/edit.png" alt="">
              </a>
             
              <form action="<?php echo e(route('producto.destroy',$producto)); ?>" method="POST" onsubmit="return confimarEliminacion()">

                 
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
    
   <div class="nav-botones">
        <?php echo e($productos->links('vendor.pagination.default')); ?>

    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.plantilla", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USUARIO\Downloads\laravelProgramacion3\holalaravel-main\resources\views/producto/index.blade.php ENDPATH**/ ?>
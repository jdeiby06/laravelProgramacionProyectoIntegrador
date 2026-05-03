<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <link rel="stylesheet" href="<?php echo e(asset('css/dashboard-ventas.css')); ?>">
     <?php $__env->slot('header', null, []); ?> 
        <h2 style="font-family:'Outfit',sans-serif; font-weight:600; font-size:18px; color:#1a1830;">Dashboard</h2>
     <?php $__env->endSlot(); ?>

    <div class="dashboard-wrapper">

        
        <div class="stats-grid">
            <div class="stat-card purple">
                <p class="stat-label">Total Productos</p>
                <p class="stat-value"><?php echo e($totalProductos); ?></p>
                <a href="<?php echo e(route('producto.index')); ?>" class="stat-link">Ver productos →</a>
            </div>
            <div class="stat-card teal">
                <p class="stat-label">Total Categorías</p>
                <p class="stat-value"><?php echo e($totalCategorias); ?></p>
                <a href="<?php echo e(route('categoria.index')); ?>" class="stat-link">Ver categorías →</a>
            </div>
            <div class="stat-card red">
                <p class="stat-label">Sin Stock</p>
                <p class="stat-value"><?php echo e($sinStock); ?></p>
                <a href="<?php echo e(route('producto.index', ['stock' => 'agotado'])); ?>" class="stat-link">Ver agotados →</a>
            </div>
            <div class="stat-card green">
                <p class="stat-label">Usuario</p>
                <p class="stat-value" style="font-size:1.3rem;"><?php echo e(auth()->user()->name); ?></p>
                <span class="stat-link" style="cursor:default; opacity:.6;"><?php echo e(auth()->user()->email); ?></span>
            </div>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($stockBajo->count()): ?>
        <div class="panel">
            <div class="panel-header">
                <h3 class="panel-title">⚠️ Productos con stock bajo <span style="font-weight:400; color:#9896b0;">(menos de 5)</span></h3>
            </div>
            <table class="inv-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $stockBajo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <tr>
                        <td data-label="Nombre"><?php echo e($p->nombre); ?></td>
                        <td data-label="Categoría"><?php echo e($p->categoria->nombre ?? 'Sin categoría'); ?></td>
                        <td data-label="Stock">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($p->stock == 0): ?>
                                <span class="badge badge-red">Agotado</span>
                            <?php else: ?>
                                <span class="badge badge-yellow"><?php echo e($p->stock); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </td>
                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div class="panel">
            <div class="panel-header">
                <h3 class="panel-title">📦 Historial de movimientos de stock</h3>
            </div>
            <table class="inv-table">
                <thead>
                    <tr>
                        <th>
                            Fecha y hora
                            <span class="sort-arrows">
                                <a href="<?php echo e(request()->fullUrlWithQuery(['orden' => 'asc', 'page' => 1])); ?>"
                                   title="Más antiguo primero"
                                   class="<?php echo e($orden === 'asc' ? 'active' : ''); ?>">▲</a>
                                <a href="<?php echo e(request()->fullUrlWithQuery(['orden' => 'desc', 'page' => 1])); ?>"
                                   title="Más reciente primero"
                                   class="<?php echo e($orden === 'desc' ? 'active' : ''); ?>">▼</a>
                            </span>
                        </th>
                        <th>Producto</th>
                        <th>Stock anterior</th>
                        <th>Stock nuevo</th>
                        <th>Usuario</th>
                        <th>Motivo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $movimientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <tr>
                        <td data-label="Fecha"><?php echo e($mov->created_at->format('d/m/Y H:i')); ?></td>
                        <td data-label="Producto"><?php echo e($mov->producto->nombre ?? 'N/A'); ?></td>
                        <td data-label="Stock anterior"><?php echo e($mov->cantidad_anterior); ?></td>
                        <td data-label="Stock nuevo">
                            <span class="<?php echo e($mov->cantidad_nueva > $mov->cantidad_anterior ? 'stock-up' : 'stock-down'); ?>">
                                <?php echo e($mov->cantidad_nueva); ?>

                                <?php echo e($mov->cantidad_nueva > $mov->cantidad_anterior ? '▲' : '▼'); ?>

                            </span>
                        </td>
                        <td data-label="Usuario"><?php echo e($mov->usuario->name ?? 'N/A'); ?></td>
                        <td data-label="Motivo">
                            <span class="badge <?php echo e($mov->motivo === 'venta registrada' ? 'badge-red' : 'badge-purple'); ?>">
                                <?php echo e($mov->motivo); ?>

                            </span>
                        </td>
                    </tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <tr>
                        <td colspan="6" style="text-align:center; padding:2rem; color:#9896b0;">
                            Sin movimientos registrados
                        </td>
                    </tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
            <div class="pagination-wrapper">
                <?php echo e($movimientos->links()); ?>

            </div>
        </div>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\USUARIO\Downloads\laravelProgramacion3\holalaravel-main\resources\views/dashboard.blade.php ENDPATH**/ ?>
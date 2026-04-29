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

     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                <div class="bg-white rounded-lg shadow p-5 border-l-4 border-purple-500">
                    <p class="text-sm text-gray-500">Total Productos</p>
                    <p class="text-3xl font-bold text-purple-600"><?php echo e($totalProductos); ?></p>
                    <a href="<?php echo e(route('producto.index')); ?>" class="text-sm text-purple-400">Ver productos →</a>
                </div>
                <div class="bg-white rounded-lg shadow p-5 border-l-4 border-teal-500">
                    <p class="text-sm text-gray-500">Total Categorías</p>
                    <p class="text-3xl font-bold text-teal-600"><?php echo e($totalCategorias); ?></p>
                    <a href="<?php echo e(route('categoria.index')); ?>" class="text-sm text-teal-400">Ver categorías →</a>
                </div>
                <div class="bg-white rounded-lg shadow p-5 border-l-4 border-red-500">
                    <p class="text-sm text-gray-500">Sin Stock</p>
                    <p class="text-3xl font-bold text-red-600"><?php echo e($sinStock); ?></p>
                    <a href="<?php echo e(route('producto.index', ['stock' => 'agotado'])); ?>" class="text-sm text-red-400">Ver agotados →</a>
                </div>
                <div class="bg-white rounded-lg shadow p-5 border-l-4 border-green-500">
                    <p class="text-sm text-gray-500">Usuario</p>
                    <p class="text-lg font-bold text-green-600"><?php echo e(auth()->user()->name); ?></p>
                    <p class="text-sm text-gray-400"><?php echo e(auth()->user()->email); ?></p>
                </div>
            </div>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($stockBajo->count()): ?>
            <div class="bg-white rounded-lg shadow p-5">
                <h3 class="font-semibold text-gray-700 mb-3">⚠️ Productos con stock bajo (menos de 5)</h3>
                <table class="w-full text-sm">
                    <thead class="bg-purple-50 text-gray-600">
                        <tr>
                            <th class="text-left p-2">Nombre</th>
                            <th class="text-left p-2">Categoría</th>
                            <th class="text-left p-2">Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $stockBajo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <tr class="border-t">
                            <td class="p-2"><?php echo e($p->nombre); ?></td>
                            <td class="p-2"><?php echo e($p->categoria->nombre ?? 'Sin categoría'); ?></td>
                            <td class="p-2">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($p->stock == 0): ?>
                                    <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">Agotado</span>
                                <?php else: ?>
                                    <span class="bg-yellow-400 text-white text-xs px-2 py-1 rounded-full"><?php echo e($p->stock); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                        </tr>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
<div class="bg-white rounded-lg shadow p-5">
    <h3 class="font-semibold text-gray-700 mb-3">📦 Historial de movimientos de stock</h3>
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600">
            <tr>
                <th class="text-left p-2">
                    <div class="flex items-center gap-1">
                        Fecha y hora
                        <div class="flex flex-col leading-none">
                            <a href="<?php echo e(request()->fullUrlWithQuery(['orden' => 'asc', 'page' => 1])); ?>"
                               title="Más nuevo primero"
                               class="text-xs <?php echo e($orden === 'asc' ? 'text-gray-800 font-bold' : 'text-gray-400 hover:text-gray-600'); ?>">▲</a>
                            <a href="<?php echo e(request()->fullUrlWithQuery(['orden' => 'desc', 'page' => 1])); ?>"
                               title="Más antiguo primero"
                               class="text-xs <?php echo e($orden === 'desc' ? 'text-gray-800 font-bold' : 'text-gray-400 hover:text-gray-600'); ?>">▼</a>
                        </div>
                    </div>
                </th>
                <th class="text-left p-2">Producto</th>
                <th class="text-left p-2">Stock anterior</th>
                <th class="text-left p-2">Stock nuevo</th>
                <th class="text-left p-2">Usuario</th>
                <th class="text-left p-2">Motivo</th>
            </tr>
        </thead>
        <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $movimientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <tr class="border-t">
                <td class="p-2 text-gray-500"><?php echo e($mov->created_at->format('d/m/Y H:i')); ?></td>
                <td class="p-2"><?php echo e($mov->producto->nombre ?? 'N/A'); ?></td>
                <td class="p-2"><?php echo e($mov->cantidad_anterior); ?></td>
                <td class="p-2">
                    <span class="<?php echo e($mov->cantidad_nueva > $mov->cantidad_anterior ? 'text-green-600' : 'text-red-600'); ?> font-semibold">
                        <?php echo e($mov->cantidad_nueva); ?>

                        <?php echo e($mov->cantidad_nueva > $mov->cantidad_anterior ? '▲' : '▼'); ?>

                    </span>
                </td>
                <td class="p-2"><?php echo e($mov->usuario->name ?? 'N/A'); ?></td>
                <td class="p-2 text-gray-500"><?php echo e($mov->motivo); ?></td>
            </tr>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            <tr>
                <td colspan="6" class="p-4 text-center text-gray-400">Sin movimientos registrados</td>
            </tr>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
    </table>
     <div class="mt-4">
                <?php echo e($movimientos->links()); ?>

            </div>
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
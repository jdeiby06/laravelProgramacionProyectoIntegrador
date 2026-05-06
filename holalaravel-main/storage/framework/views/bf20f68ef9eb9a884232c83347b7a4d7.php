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
        <h2 style="font-family:'Outfit',sans-serif; font-weight:600; font-size:18px; color:#1a1830;">Registrar Venta</h2>
     <?php $__env->endSlot(); ?>

    <div class="venta-wrapper">

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
            <div class="alert alert-success">✓ <?php echo e(session('success')); ?></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('error')): ?>
            <div class="alert alert-error">✕ <?php echo e(session('error')); ?></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
            <div class="alert alert-error">✕ <?php echo e($errors->first()); ?></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="venta-panel">

            
            <div class="venta-panel-header">
                <h2>Registrar Venta</h2>
                <p>Selecciona los productos y cantidades a vender</p>
            </div>

            <div class="venta-panel-body">

                
                <div style="overflow-x:auto;">
                    <table class="venta-table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Stock disponible</th>
                                <th>Precio de venta</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <tr>
                                <td class="product-name"><?php echo e($producto->nombre); ?></td>
                                <td class="stock-cell <?php echo e($producto->stock < 5 ? 'low' : ''); ?>">
                                    <?php echo e($producto->stock); ?>

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($producto->stock < 5): ?>
                                        <span class="badge badge-yellow" style="margin-left:6px;">Bajo</span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </td>
                                <td>$<?php echo e(number_format($producto->precio_venta, 2)); ?></td>
                                <td>
                                    <input
                                        type="number"
                                        class="qty-input cantidad-input"
                                        min="0"
                                        max="<?php echo e($producto->stock); ?>"
                                        value="0"
                                        data-id="<?php echo e($producto->id); ?>"
                                        data-precio="<?php echo e($producto->precio_venta); ?>"
                                        data-nombre="<?php echo e($producto->nombre); ?>"
                                    >
                                </td>
                            </tr>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </tbody>
                    </table>
                </div>

                
                <div class="venta-resumen">
                    <h4>Resumen de venta</h4>
                    <div id="resumen" class="resumen-items">
                        <span style="color:#9896b0; font-style:italic;">Sin productos seleccionados</span>
                    </div>
                    <div class="venta-total">
                        <span>Total</span>
                        <span class="total-amount">$<span id="total">0.00</span></span>
                    </div>
                </div>

                
                <form method="POST" action="<?php echo e(route('ventas.store')); ?>" id="form-venta">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="items" id="items-input" value="[]">
                    <button type="submit" class="btn-registrar">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M5 13l4 4L19 7"/>
                        </svg>
                        Registrar Venta
                    </button>
                </form>

            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('form-venta');
        const itemsInput = document.getElementById('items-input');
        const resumenDiv = document.getElementById('resumen');
        const totalSpan = document.getElementById('total');

        function getItems() {
            const inputs = document.querySelectorAll('.cantidad-input');
            let items = [];
            let total = 0;
            let html = '';

            inputs.forEach(function(input) {
                const cant = parseInt(input.value) || 0;
                if (cant > 0) {
                    const precio = parseFloat(input.dataset.precio);
                    const subtotal = cant * precio;
                    total += subtotal;
                    html += '<div class="resumen-row"><span>' + input.dataset.nombre + ' × ' + cant + '</span><span>$' + subtotal.toFixed(2) + '</span></div>';
                    items.push({ producto_id: input.dataset.id, cantidad: cant });
                }
            });

            resumenDiv.innerHTML = html || '<span style="color:#9896b0; font-style:italic;">Sin productos seleccionados</span>';
            totalSpan.textContent = total.toFixed(2);
            return items;
        }

        document.querySelectorAll('.cantidad-input').forEach(function(input) {
            input.addEventListener('input', function() { getItems(); });
        });

        form.addEventListener('submit', function(e) {
            const items = getItems();
            if (items.length === 0) {
                e.preventDefault();
                alert('Selecciona al menos un producto.');
                return;
            }
            itemsInput.value = JSON.stringify(items);
        });
    });
    </script>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\USUARIO\Downloads\laravelProgramacion3\holalaravel-main\resources\views/ventas/registrar.blade.php ENDPATH**/ ?>
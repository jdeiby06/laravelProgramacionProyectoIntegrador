<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('titulomain'); ?> — InventorySoft</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css']); ?>

    <link rel="stylesheet" href="<?php echo e(asset('css/sidebar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/crud-styles.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/dashboard-ventas.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/estilos-tablas.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/estilos-formularios.css')); ?>">
</head>
<body>

    
    <aside class="slidebar" id="slidebar">

        
        <a href="<?php echo e(route('dashboard')); ?>" class="logo">
            <img src="<?php echo e(asset('img/InventoryLogo.jpg')); ?>" alt="Logo" class="logo-img">
            <p class="logo-text">InventorySoft</p>
        </a>

        
        <div class="element-slidebar">
            <div class="element-slidebar-btn profile">
                <span>
                    <img src="<?php echo e(asset('img/InventoryLogo.jpg')); ?>" alt="avatar">
                </span>
                <p><?php echo e(auth()->user()->name ?? 'Usuario'); ?></p>
            </div>
            <div class="element-slidebar-content">
                <a href="<?php echo e(route('profile.edit')); ?>">Perfil</a>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="submit" value="Cerrar sesión" class="logout-link">
                </form>
            </div>
        </div>

        
        <p class="sidebar-section-label">Menú</p>

        <div class="element-slidebar">
            <a href="<?php echo e(route('dashboard')); ?>" class="element-slidebar-btn">
                <span><img src="<?php echo e(asset('img/compras.png')); ?>" alt="Dashboard"></span>
                Dashboard
            </a>
        </div>

        <div class="element-slidebar">
            <a href="<?php echo e(route('categoria.index')); ?>" class="element-slidebar-btn">
                <span><img src="<?php echo e(asset('img/category.png')); ?>" alt="Categorías"></span>
                Categorías
            </a>
        </div>

        <div class="element-slidebar">
            <a href="<?php echo e(route('producto.index')); ?>" class="element-slidebar-btn">
                <span><img src="<?php echo e(asset('img/rokrt.png')); ?>" alt="Productos"></span>
                Productos
            </a>
        </div>

    </aside>

    
    <main class="main">
        <header class="header">
            <div class="titulo-nav"><?php echo $__env->yieldContent('titulomain'); ?></div>
            <button id="menu-toggle" class="menu-hamburger">☰</button>
        </header>

        <?php echo $__env->yieldContent('contenido'); ?>
    </main>

    <script src="<?php echo e(asset('js/script.js')); ?>"></script>

    <script>
        // Marcar item activo del sidebar según URL actual
        document.addEventListener('DOMContentLoaded', function () {
            const currentUrl = window.location.href;
            document.querySelectorAll('.element-slidebar-btn').forEach(function(btn) {
                const link = btn.getAttribute('href');
                if (link && currentUrl.includes(link) && link !== '/') {
                    btn.classList.add('active');
                }
            });

            // Toggle perfil
            const profileBtn = document.querySelector('.profile');
            if (profileBtn) {
                profileBtn.addEventListener('click', function () {
                    this.closest('.element-slidebar').classList.toggle('active');
                });
            }
        });
    </script>

</body>
</html><?php /**PATH C:\Users\USUARIO\Downloads\laravelProgramacion3\holalaravel-main\resources\views/layouts/plantilla.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulomain') — InventorySoft</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    @vite(['resources/css/app.css'])

    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/crud-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard-ventas.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos-tablas.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos-formularios.css') }}">
</head>
<body>

    {{-- SIDEBAR --}}
    <aside class="slidebar" id="slidebar">

        {{-- Logo --}}
        <a href="{{ route('dashboard') }}" class="logo">
            <img src="{{ asset('img/InventoryLogo.jpg') }}" alt="Logo"  class="logo-img">
            <p class="logo-text">InventorySoft</p>
        </a>

        {{-- Perfil --}}
        <div class="element-slidebar">
            <div class="element-slidebar-btn profile">
                <span>
                    <img src="{{ asset('img/InventoryLogo.jpg') }}" alt="avatar">
                </span>
                <p>{{ auth()->user()->name ?? 'Usuario' }}</p>
            </div>
            <div class="element-slidebar-content">
                <a href="{{ route('profile.edit') }}">Perfil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <input type="submit" value="Cerrar sesión" class="logout-link">
                </form>
            </div>
        </div>

        {{-- Navegación --}}
        <p class="sidebar-section-label">Menú</p>

        <div class="element-slidebar">
            <a href="{{ route('dashboard') }}" class="element-slidebar-btn">
                <span><img src="{{ asset('img/dashboard.png') }}" alt="Dashboard"></span>
                Dashboard
            </a>
        </div>

        <div class="element-slidebar">
            <a href="{{ route('categoria.index') }}" class="element-slidebar-btn">
                <span><img src="{{ asset('img/category.png') }}" alt="Categorías"></span>
                Categorías
            </a>
        </div>

        <div class="element-slidebar">
            <a href="{{ route('producto.index') }}" class="element-slidebar-btn">
                <span><img src="{{ asset('img/productos.png') }}" alt="Productos"></span>
                Productos
            </a>
        </div>

    </aside>

    {{-- MAIN --}}
    <main class="main">
        <header class="header">
            <div class="titulo-nav">@yield('titulomain')</div>
            <button id="menu-toggle" class="menu-hamburger">☰</button>
        </header>

        @yield('contenido')
    </main>

    <script src="{{ asset('js/script.js') }}"></script>

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
</html>
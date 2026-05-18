<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InventorySoft</title>
    <link rel="icon" href="img/icono1.png" type="InventoryLogo/jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/estilos-bienvenida.css')}}">
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
  {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

</head>
<body>
    <header>
        <input type="checkbox" id="menu">
        <label for="menu" class="hamburger">
            <span class="barras">≡</span>
            <span class="equis">x</span>
        </label>
        <section class="contenedor-nav">
           <div class="logo-nav">
             <img src="img/InventoryLogo.jpg" alt="logo">
             <span>InventorySoft</span>
           </div>
           <nav>
            <ul>
                <li><a href="">Inicio</a></li>
                <li><a href="">Contacto</a></li>
                @auth
                      <li>  <a href="{{ url('/dashboard') }}">Dashboard </a></li>
                @else
                     <li>   <a href="{{ route('login') }}"> Log in    </a></li>

                      
                @endauth
                
                
                
                
            </ul>
           </nav>
        </section>
        <section class="textos-header">
          <h1>InventorySoft</h1>
          <h2>El Software de Gestión de Inventario indicado.</h2>
        </section>
    </header>
    

     </section>
     
     
    
     

      
     <!-- footer****** -->
      <footer>
        <p>&copy;2026 InventorySoft.    Todos los derechos reservados </p>
        <div class="footer-links">
            <a href="">Politica de Privacidad</a>
            <a href="">Terminos y condiciones</a>
            <a href="">Contacto</a>

        </div>
      </footer>
</body>
</html>
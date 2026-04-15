<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-texto-hover: rgba(129, 67, 191, 0.8);
            --color-main: rgb(244, 247, 250);
            --color-texto: rgba(25, 22, 22, 0.836);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Roboto", sans-serif;
            background-color: var(--color-main);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: var(--color-texto);
        }

        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(129, 67, 191, 0.15);
            padding: 40px;
            width: 100%;
            max-width: 420px;
            border-top: 4px solid var(--color-texto-hover);
        }

        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-logo img {
            width: 70px;
            height: 70px;
            margin-bottom: 10px;
        }

        .login-logo h1 {
            font-size: 22px;
            font-weight: 700;
            color: var(--color-texto-hover);
        }

        .login-logo p {
            font-size: 13px;
            color: #999;
            margin-top: 4px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 6px;
            color: var(--color-texto);
        }

        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            font-family: "Roboto", sans-serif;
            color: var(--color-texto);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            outline: none;
        }

        .form-group input:focus {
            border-color: var(--color-texto-hover);
            box-shadow: 0 0 0 3px rgba(129, 67, 191, 0.1);
        }

        .form-error {
            color: #dc3545;
            font-size: 12px;
            margin-top: 4px;
        }

        .remember-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            font-size: 13px;
            color: #666;
        }

        .remember-row input[type="checkbox"] {
            accent-color: var(--color-texto-hover);
            width: 15px;
            height: 15px;
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            padding: 11px;
            background-color: var(--color-texto-hover);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 500;
            font-family: "Roboto", sans-serif;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-login:hover {
            background-color: rgba(109, 47, 171, 0.9);
            box-shadow: 0 4px 12px rgba(129, 67, 191, 0.3);
        }

        .forgot-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
            color: #999;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: var(--color-texto-hover);
        }

        .session-status {
            background-color: rgba(129, 67, 191, 0.1);
            border: 1px solid var(--color-texto-hover);
            border-radius: 8px;
            padding: 10px 15px;
            font-size: 13px;
            color: var(--color-texto-hover);
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="login-card">

        
        <div class="login-logo">
            <img src="<?php echo e(asset('img/InventoryLogo.png')); ?>" alt="Logo"
                onerror="this.style.display='none'">
            <h1>Bienvenido</h1>
            <p>Inicia sesión para continuar</p>
        </div>

        
        <?php if(session('status')): ?>
            <div class="session-status"><?php echo e(session('status')); ?></div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>

            
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email"
                    value="<?php echo e(old('email')); ?>"
                    required autofocus autocomplete="username">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="form-error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password"
                    required autocomplete="current-password">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="form-error"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div class="remember-row">
                <input type="checkbox" id="remember_me" name="remember">
                <label for="remember_me">Recordarme</label>
            </div>

            
            <button type="submit" class="btn-login">Iniciar Sesión</button>

            
            <?php if(Route::has('password.request')): ?>
                <a href="<?php echo e(route('password.request')); ?>" class="forgot-link">
                    ¿Olvidaste tu contraseña?
                </a>
            <?php endif; ?>

        </form>
    </div>

</body>
</html><?php /**PATH C:\Users\USUARIO\Downloads\laravelProgramacion3\holalaravel-main\resources\views/auth/login.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="es">

<head>

<style>
    .page-content {
        text-align: center;
        padding: 40px 20px;
    }

    .page-content h1 {
        font-size: 36px;
        margin-bottom: 20px;
    }

    .page-content p {
        font-size: 20px;
        line-height: 1.6;
        margin-bottom: 20px;
    }
</style>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Portal Seguro')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <!-- Barra de navegación -->

    <header class="navbar">
        <div class="navbar-container">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="brand">
                <span class="brand-icon">🔒</span>
                <span>Portal Seguro</span>
            </a>

            <!-- Navegación -->
            <nav class="nav-links">
                <a href="{{ route('home') }}">
                    Inicio
                </a>
                <a href="{{ route('about') }}">
                    Acerca
                </a>
                <a href="{{ route('contact') }}">
                    Contacto
                </a>
            </nav>

            <!-- Acceso -->
            <div class="nav-auth">
                @auth
                    <a href="{{ route('dashboard') }}" class="login-nav">
                        👤 Mi cuenta
                    </a>
                @else
                    <a href="{{ route('login') }}" class="login-nav">
                        👤 Iniciar sesión
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Contenido -->
    <main>
        @yield('content')
    </main>
</body>
</html>
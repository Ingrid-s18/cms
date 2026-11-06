<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'El Legado ProRecetas - CMS')</title>

    <!-- FUENTES TIPOGRÁFICAS: Playfair Display (Títulos Serif) & Inter (Cuerpo Sans-Serif) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP ICONS (Iconografía vectorial profesional - CERO EMOJIS) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- TAILWIND CSS CDN CON LA PALETA ELEGANTE Y CLÁSICA CONFIGURADA -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-bg': '#FDFBF7',
                        'header-bg': '#1A2B4C',
                        'accent-purple': '#9B59B6',
                        'text-main': '#333333',
                        'gold-accent': '#D4AF37',
                        'gold-light': '#FAF6ED'
                    },
                    fontFamily: {
                        serif: ['"Playfair Display"', 'Georgia', 'serif'],
                        sans: ['Inter', 'Roboto', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <!-- ESTILOS GLOBALES -->
    <style>
        body {
            background-color: #FDFBF7;
            color: #333333;
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
        }

        h1, h2, h3, h4, .font-serif {
            font-family: 'Playfair Display', serif;
        }

        /* TEXTURA SUTIL DE PAPEL ARTESANAL */
        .paper-texture {
            background-image: radial-gradient(#C5A059 0.65px, transparent 0.65px), radial-gradient(#9B59B6 0.65px, #FDFBF7 0.65px);
            background-size: 26px 26px;
            background-position: 0 0, 13px 13px;
        }

        /* EFECTO DE ELEVACIÓN HOVER */
        .card-elevation {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-elevation:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(26, 43, 76, 0.12), 0 10px 10px -5px rgba(26, 43, 76, 0.04);
        }

        /* BOTONES PÚRPURA DE ACCIÓN */
        .btn-purple-gradient {
            background: linear-gradient(135deg, #9B59B6 0%, #8E44AD 100%);
            box-shadow: 0 4px 12px rgba(155, 89, 182, 0.25);
            transition: all 0.25s ease;
        }

        .btn-purple-gradient:hover {
            background: linear-gradient(135deg, #8E44AD 0%, #7D3C98 100%);
            box-shadow: 0 6px 18px rgba(155, 89, 182, 0.35);
            transform: translateY(-1px);
        }

        .btn-purple-gradient:active {
            transform: scale(0.98);
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#FDFBF7] text-[#333333] antialiased flex flex-col min-h-screen">

    <!-- ========================================================================= -->
    <!-- HEADER REESTRUCTURADO (ORDEN EXACTO: Principal, Menú, Acerca, Perfil, Contacto) -->
    <!-- ========================================================================= -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-[#1A2B4C] text-white shadow-xl border-b border-[#D4AF37]/35 backdrop-blur-md bg-opacity-95">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- LOGO & BRAND: El Legado ProRecetas - CMS -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group select-none">
                    <div class="p-2 rounded-xl bg-gradient-to-br from-[#243B68] to-[#121F37] border border-[#D4AF37]/50 shadow-inner group-hover:scale-105 transition-transform duration-300">
                        <svg class="w-8 h-8" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 4L7 9V22C7 33.2 14.3 43.6 24 46C33.7 43.6 41 33.2 41 22V9L24 4Z" stroke="#D4AF37" stroke-width="2.5" fill="rgba(212, 175, 55, 0.1)"/>
                            <path d="M16 16L30 30M16 16L18 14L21 17L19 19M16 16L14 18L17 21L19 19M30 30L33 33" stroke="#D4AF37" stroke-width="2" stroke-linecap="round"/>
                            <path d="M32 16L18 30M32 16C34 18 34 21 31 22L20 32M18 30L15 33" stroke="#D4AF37" stroke-width="2" stroke-linecap="round"/>
                            <polygon points="24,19 25.2,22.2 28.5,22.4 26,24.5 26.8,27.8 24,26 21.2,27.8 22,24.5 19.5,22.4 22.8,22.2" fill="#D4AF37"/>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-serif text-xl sm:text-2xl font-bold tracking-wider text-[#FDFBF7]">
                            El Legado
                        </span>
                        <span class="text-[10px] uppercase tracking-[0.25em] text-[#D4AF37] font-medium leading-none mt-1">
                            ProRecetas &bull; CMS
                        </span>
                    </div>
                </a>

                <!-- 5 PESTAÑAS EN ORDEN EXACTO (SIN Pedidos NI Reservas) -->
                <nav class="hidden md:flex items-center space-x-1 lg:space-x-2">
                    
                    <!-- 1. PÁGINA PRINCIPAL -->
                    <a href="{{ route('home') }}" 
                       class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all duration-200 flex items-center gap-1.5 {{ request()->routeIs('home') ? 'text-[#FDFBF7] bg-[#243B68] border border-[#D4AF37]/50 shadow-xs' : 'text-gray-300 hover:text-white hover:bg-white/5' }}">
                        <i class="bi bi-house-door {{ request()->routeIs('home') ? 'text-[#D4AF37]' : 'text-gray-400' }}"></i>
                        <span>Página Principal</span>
                    </a>

                    <!-- 2. MENÚ -->
                    @auth
                        <a href="{{ route('posts.index') }}" 
                           class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all duration-200 flex items-center gap-1.5 {{ request()->routeIs('posts.*') ? 'text-[#FDFBF7] bg-[#243B68] border border-[#D4AF37]/50 shadow-xs' : 'text-gray-300 hover:text-white hover:bg-white/5' }}">
                            <i class="bi bi-cup-hot {{ request()->routeIs('posts.*') ? 'text-[#D4AF37]' : 'text-gray-400' }}"></i>
                            <span>Menú</span>
                        </a>
                    @else
                        <a href="{{ route('posts.index') }}" 
                           class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all duration-200 flex items-center gap-1.5 text-gray-300 hover:text-white hover:bg-white/5">
                            <i class="bi bi-cup-hot text-gray-400"></i>
                            <span>Menú</span>
                        </a>
                    @endauth

                    <!-- 3. ACERCA DE -->
                    <a href="{{ route('about') }}" 
                       class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all duration-200 flex items-center gap-1.5 {{ request()->routeIs('about') ? 'text-[#FDFBF7] bg-[#243B68] border border-[#D4AF37]/50 shadow-xs' : 'text-gray-300 hover:text-white hover:bg-white/5' }}">
                        <i class="bi bi-book {{ request()->routeIs('about') ? 'text-[#D4AF37]' : 'text-gray-400' }}"></i>
                        <span>Acerca de</span>
                    </a>

                    <!-- 4. PERFIL -->
                    @auth
                        <a href="{{ route('dashboard') }}" 
                           class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all duration-200 flex items-center gap-1.5 {{ request()->routeIs('dashboard') ? 'text-[#FDFBF7] bg-[#243B68] border border-[#D4AF37]/50 shadow-xs' : 'text-gray-300 hover:text-white hover:bg-white/5' }}">
                            <i class="bi bi-person {{ request()->routeIs('dashboard') ? 'text-[#D4AF37]' : 'text-gray-400' }}"></i>
                            <span>Perfil</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="px-3.5 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white hover:bg-white/5 flex items-center gap-1.5">
                            <i class="bi bi-person text-gray-400"></i>
                            <span>Perfil</span>
                        </a>
                    @endauth

                    <!-- 5. CONTACTO -->
                    <a href="{{ route('contact') }}" 
                       class="px-3.5 py-2 rounded-lg text-sm font-medium transition-all duration-200 flex items-center gap-1.5 {{ request()->routeIs('contact') ? 'text-[#FDFBF7] bg-[#243B68] border border-[#D4AF37]/50 shadow-xs' : 'text-gray-300 hover:text-white hover:bg-white/5' }}">
                        <i class="bi bi-envelope {{ request()->routeIs('contact') ? 'text-[#D4AF37]' : 'text-gray-400' }}"></i>
                        <span>Contacto</span>
                    </a>

                </nav>

                <!-- ESQUINA SUPERIOR DERECHA: BOTÓN DESTACADO "Iniciar Sesión" / "Cerrar Sesión" -->
                <div class="hidden md:flex items-center space-x-3">
                    @auth
                        <div class="flex items-center space-x-3">
                            <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 pl-2 py-1 pr-3 rounded-full bg-[#121F37]/70 border border-white/10 hover:border-[#D4AF37]/60 transition-all">
                                <span class="w-7 h-7 rounded-full bg-gradient-to-tr from-[#9B59B6] to-[#D4AF37] flex items-center justify-center text-white text-xs font-bold shadow-xs">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                </span>
                                <span class="text-xs text-white font-medium">{{ Auth::user()->name }}</span>
                            </a>

                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-red-600/20 hover:bg-red-600/30 text-red-200 border border-red-500/30 text-xs font-medium transition-all" title="Cerrar Sesión">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Cerrar Sesión</span>
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" 
                           class="flex items-center gap-2 px-5 py-2.5 rounded-lg btn-purple-gradient text-white text-sm font-semibold border border-[#D4AF37]/40 shadow-md">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <span>Iniciar Sesión</span>
                        </a>
                    @endauth
                </div>

                <!-- BOTÓN MÓVIL TOGGLE -->
                <div class="flex md:hidden">
                    <button id="mobile-toggle-btn" type="button" class="p-2 rounded-lg bg-[#243B68]/70 text-gray-200 hover:text-white border border-[#D4AF37]/30">
                        <i class="bi bi-list text-xl"></i>
                    </button>
                </div>

            </div>
        </div>

        <!-- MENÚ MÓVIL DESPLEGABLE -->
        <div id="mobile-menu-drawer" class="hidden md:hidden bg-[#16233E] border-b border-[#D4AF37]/30 px-4 pt-3 pb-6 space-y-2">
            <a href="{{ route('home') }}" class="block px-4 py-2.5 rounded-lg text-sm text-gray-200 hover:bg-white/5">Página Principal</a>
            <a href="{{ route('posts.index') }}" class="block px-4 py-2.5 rounded-lg text-sm text-gray-200 hover:bg-white/5">Menú</a>
            <a href="{{ route('about') }}" class="block px-4 py-2.5 rounded-lg text-sm text-gray-200 hover:bg-white/5">Acerca de</a>
            <a href="{{ route('dashboard') }}" class="block px-4 py-2.5 rounded-lg text-sm text-gray-200 hover:bg-white/5">Perfil</a>
            <a href="{{ route('contact') }}" class="block px-4 py-2.5 rounded-lg text-sm text-gray-200 hover:bg-white/5">Contacto</a>
            <div class="pt-3 border-t border-white/10">
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-300 hover:text-red-200">Cerrar Sesión</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="block text-center px-4 py-2.5 rounded-lg btn-purple-gradient text-white text-sm font-semibold">Iniciar Sesión</a>
                @endauth
            </div>
        </div>
    </header>

    <!-- ESPACIADOR SUPERIOR PARA EL HEADER FIJO -->
    <div class="h-20"></div>

    <!-- CONTENIDO DINÁMICO DE CADA VISTA -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- PIE DE PÁGINA CLÁSICO -->
    <footer class="bg-[#1A2B4C] text-white border-t border-[#D4AF37]/30 py-8 px-4 text-center text-xs text-gray-400 mt-16">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <span class="font-serif font-bold text-[#FDFBF7]">El Legado ProRecetas - CMS</span>
                <span>&bull; Tradición & Cocina Colombiana</span>
            </div>
            <p class="font-light">Precios en Pesos Colombianos (COP) &bull; Todos los derechos reservados &copy; 2026</p>
            <div class="flex items-center gap-3 text-[#D4AF37]">
                <span>Calidad Tradicional</span>
                <div class="w-1.5 h-1.5 rotate-45 bg-[#D4AF37]"></div>
                <span>Sabor de Origen</span>
            </div>
        </div>
    </footer>

    <!-- SCRIPT DE INTERACCIÓN MÓVIL -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('mobile-toggle-btn');
            const drawer = document.getElementById('mobile-menu-drawer');
            if (btn && drawer) {
                btn.addEventListener('click', function() {
                    drawer.classList.toggle('hidden');
                });
            }
        });
    </script>

</body>
</html>

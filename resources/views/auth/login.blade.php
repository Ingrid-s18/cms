@extends('layouts.app')

@section('title', 'Iniciar Sesión - El Legado ProRecetas - CMS')

@section('content')

<div class="relative min-h-[calc(100vh-5rem)] flex items-center justify-center py-16 px-4 sm:px-6 lg:px-8 bg-[#FDFBF7] paper-texture overflow-hidden">
    
    <!-- RESPLANDORES SUTILES DECORATIVOS -->
    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-[#9B59B6]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-80 h-80 bg-[#D4AF37]/10 rounded-full blur-3xl pointer-events-none"></div>

    <!-- TARJETA DE LOGIN CENTRADA CON EFECTO DE ELEVACIÓN HOVER -->
    <div class="relative z-10 w-full max-w-md bg-white/95 backdrop-blur-sm rounded-2xl p-8 sm:p-10 shadow-lg card-elevation border border-[#E8E2D7] ring-1 ring-[#D4AF37]/25">
        
        <!-- ESCUDO DORADO EN LA PARTE SUPERIOR -->
        <div class="flex flex-col items-center text-center mb-8">
            <div class="w-20 h-20 rounded-full bg-gradient-to-br from-[#FFFDF7] to-[#F5ECE0] border-2 border-[#D4AF37] shadow-md flex items-center justify-center p-3 transform hover:scale-105 transition-transform duration-300">
                <!-- Escudo con cubiertos dorado -->
                <svg class="w-12 h-12" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M24 4L7 9V22C7 33.2 14.3 43.6 24 46C33.7 43.6 41 33.2 41 22V9L24 4Z" stroke="#D4AF37" stroke-width="2.5" fill="rgba(212, 175, 55, 0.1)"/>
                    <path d="M16 16L30 30M16 16L18 14L21 17L19 19M16 16L14 18L17 21L19 19M30 30L33 33" stroke="#D4AF37" stroke-width="2" stroke-linecap="round"/>
                    <path d="M32 16L18 30M32 16C34 18 34 21 31 22L20 32M18 30L15 33" stroke="#D4AF37" stroke-width="2" stroke-linecap="round"/>
                    <polygon points="24,19 25.2,22.2 28.5,22.4 26,24.5 26.8,27.8 24,26 21.2,27.8 22,24.5 19.5,22.4 22.8,22.2" fill="#D4AF37"/>
                </svg>
            </div>
            <h1 class="mt-4 font-serif text-3xl font-bold text-[#1A2B4C] tracking-tight">
                Iniciar Sesión
            </h1>
            <p class="mt-1 text-xs uppercase tracking-[0.2em] text-[#9B59B6] font-semibold">
                Portal CMS &bull; Restaurante Elegante
            </p>

            <div class="mt-3 flex items-center justify-center space-x-2 w-full">
                <div class="h-px bg-gradient-to-r from-transparent via-[#D4AF37]/60 to-transparent flex-1"></div>
                <div class="w-1.5 h-1.5 rotate-45 bg-[#D4AF37]"></div>
                <div class="h-px bg-gradient-to-r from-transparent via-[#D4AF37]/60 to-transparent flex-1"></div>
            </div>
        </div>

        <!-- FORMULARIO -->
        <form method="POST" action="{{ route('login.store') }}" class="space-y-6">
            @csrf

            <!-- CAMPO: USUARIO / CORREO CON ICONO -->
            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#333333] mb-1.5">
                    Correo Electrónico / Usuario
                </label>
                <div class="relative rounded-lg shadow-xs">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-[#9B59B6]">
                        <i class="bi bi-person text-lg"></i>
                    </div>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="chef@palais.com"
                        required
                        autocomplete="email"
                        class="block w-full pl-11 pr-4 py-3 bg-[#FAF8F5] border @error('email') border-red-500 @else border-[#E0D9CE] @enderror rounded-lg text-sm text-[#333333] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#9B59B6]/40 focus:border-[#9B59B6] transition-all"
                    >
                </div>
                @error('email')
                    <p class="mt-1.5 text-xs text-red-600 font-medium flex items-center gap-1">
                        <i class="bi bi-exclamation-circle"></i>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>

            <!-- CAMPO: CONTRASEÑA CON ICONO Y BOTÓN VISIBILIDAD -->
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-[#333333]">
                        Contraseña
                    </label>
                </div>
                <div class="relative rounded-lg shadow-xs">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-[#9B59B6]">
                        <i class="bi bi-lock text-lg"></i>
                    </div>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="••••••••••••"
                        required
                        autocomplete="current-password"
                        class="block w-full pl-11 pr-11 py-3 bg-[#FAF8F5] border @error('password') border-red-500 @else border-[#E0D9CE] @enderror rounded-lg text-sm text-[#333333] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#9B59B6]/40 focus:border-[#9B59B6] transition-all"
                    >
                    <button
                        type="button"
                        id="toggle-pass-btn"
                        onclick="togglePassword()"
                        class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-[#9B59B6] transition-colors"
                        title="Ver / Ocultar contraseña"
                    >
                        <i id="toggle-pass-icon" class="bi bi-eye text-lg"></i>
                    </button>
                </div>
                @error('password')
                    <p class="mt-1.5 text-xs text-red-600 font-medium flex items-center gap-1">
                        <i class="bi bi-exclamation-circle"></i>
                        <span>{{ $message }}</span>
                    </p>
                @enderror
            </div>

            <!-- RECORDARME -->
            <div class="flex items-center justify-between">
                <label class="flex items-center text-xs text-[#555555] cursor-pointer">
                    <input
                        type="checkbox"
                        name="remember"
                        value="1"
                        class="h-4 w-4 rounded border-gray-300 text-[#9B59B6] focus:ring-[#9B59B6] accent-[#9B59B6]"
                    >
                    <span class="ml-2">Recordarme en este equipo</span>
                </label>
                <a href="{{ route('contact') }}" class="text-xs text-[#9B59B6] hover:text-[#7D3C98] font-medium hover:underline">
                    ¿Asistencia técnica?
                </a>
            </div>

            <!-- BOTÓN GRANDE INICIAR SESIÓN CON GRADIENTE PÚRPURA -->
            <div>
                <button
                    type="submit"
                    class="w-full py-3.5 px-6 rounded-lg btn-purple-gradient text-white font-medium text-base shadow-md flex items-center justify-center space-x-2"
                >
                    <span>Iniciar sesión</span>
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>

        </form>

        <!-- REGISTRO / PIE -->
        <div class="mt-8 pt-6 border-t border-[#F0EBE1] text-center">
            <p class="text-xs text-gray-500">
                ¿No dispone de credenciales autorizadas?
                <a href="{{ route('register') }}" class="font-medium text-[#9B59B6] hover:text-[#7D3C98] hover:underline ml-1">
                    ✚ Registrar nuevo usuario
                </a>
            </p>
        </div>

    </div>

</div>

<script>
function togglePassword() {
    const password = document.getElementById('password');
    const icon = document.getElementById('toggle-pass-icon');

    if (password.type === 'password') {
        password.type = 'text';
        icon.className = 'bi bi-eye-slash text-lg text-[#9B59B6]';
    } else {
        password.type = 'password';
        icon.className = 'bi bi-eye text-lg text-gray-400';
    }
}
</script>

@endsection

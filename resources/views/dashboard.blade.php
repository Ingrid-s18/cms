@extends('layouts.app')

@section('title', 'El Legado ProRecetas - Perfil de Usuario')

@section('content')

<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-xl mx-auto min-h-screen bg-[#FDFBF7]">

    <!-- CABECERA -->
    <div class="mb-10 pb-6 border-b border-[#E8E2D7] text-center">
        <span class="text-xs uppercase tracking-[0.25em] text-[#9B59B6] font-semibold">
            Panel de Usuario &bull; El Legado ProRecetas
        </span>
        <h1 class="mt-1 font-serif text-3xl sm:text-4xl font-bold text-[#1A2B4C] tracking-tight">
            Perfil de Usuario
        </h1>
        <p class="mt-2 text-sm text-[#555555] font-light">
            Información de tu cuenta y sesión activa en el sistema.
        </p>
    </div>

    <!-- TARJETA ÚNICA DE INFORMACIÓN BÁSICA DEL USUARIO (SIN PREFERENCIAS DE PLATOS) -->
    <div class="card-elevation bg-white rounded-3xl p-8 sm:p-10 border border-[#E8E2D7] shadow-xl">
        
        <!-- Avatar del usuario -->
        <div class="flex flex-col items-center text-center pb-6 border-b border-[#F3EFE8]">
            <div class="relative">
                <div class="w-24 h-24 rounded-full bg-gradient-to-tr from-[#1A2B4C] via-[#243B68] to-[#9B59B6] text-white flex items-center justify-center font-serif text-2xl font-bold border-4 border-[#D4AF37] shadow-lg ring-4 ring-[#FAF6ED]">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>
                <span class="absolute bottom-0 right-0 p-1.5 rounded-full bg-emerald-500 text-white shadow-xs" title="Sesión Activa">
                    <i class="bi bi-shield-check text-xs"></i>
                </span>
            </div>

            <!-- Nombre -->
            <h2 class="mt-4 font-serif text-2xl font-bold text-[#1A2B4C]">
                {{ Auth::user()->name }}
            </h2>

            <p class="text-xs uppercase tracking-wider text-[#9B59B6] font-semibold mt-1">
                Usuario Registrado &bull; El Legado
            </p>

            <span class="mt-3 inline-block px-3 py-0.5 rounded-full text-[11px] font-medium bg-emerald-50 text-emerald-800 border border-emerald-200">
                ● Sesión Iniciada
            </span>
        </div>

        <!-- Información básica requerida: Nombre y Correo -->
        <div class="py-6 space-y-5 text-sm border-b border-[#F3EFE8]">
            <div>
                <span class="text-[11px] uppercase tracking-wider text-gray-400 font-semibold block mb-1">
                    Nombre Completo
                </span>
                <div class="flex items-center gap-2.5 text-[#1A2B4C] font-semibold text-base">
                    <i class="bi bi-person-circle text-[#9B59B6]"></i>
                    <span>{{ Auth::user()->name }}</span>
                </div>
            </div>

            <div>
                <span class="text-[11px] uppercase tracking-wider text-gray-400 font-semibold block mb-1">
                    Correo Electrónico
                </span>
                <div class="flex items-center gap-2.5 text-[#1A2B4C] font-medium font-mono text-sm">
                    <i class="bi bi-envelope text-[#9B59B6]"></i>
                    <span>{{ Auth::user()->email }}</span>
                </div>
            </div>
        </div>

        <!-- Botón de Cerrar Sesión -->
        <div class="pt-6">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-red-600/15 hover:bg-red-600/25 text-red-700 text-sm font-semibold border border-red-300 transition-colors shadow-xs">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Cerrar Sesión</span>
                </button>
            </form>
        </div>

    </div>

</div>

@endsection

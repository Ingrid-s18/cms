@extends('layouts.app')

@section('title', 'Registro - El Legado ProRecetas - CMS')

@section('content')

<div class="relative min-h-[calc(100vh-5rem)] flex items-center justify-center py-16 px-4 sm:px-6 lg:px-8 bg-[#FDFBF7] paper-texture overflow-hidden">

    <div class="relative z-10 w-full max-w-md bg-white/95 backdrop-blur-sm rounded-2xl p-8 sm:p-10 shadow-lg card-elevation border border-[#E8E2D7] ring-1 ring-[#D4AF37]/25">
        
        <div class="flex flex-col items-center text-center mb-8">
            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-[#FFFDF7] to-[#F5ECE0] border-2 border-[#D4AF37] shadow-md flex items-center justify-center p-2.5">
                <i class="bi bi-person-plus text-2xl text-[#D4AF37]"></i>
            </div>
            <h1 class="mt-4 font-serif text-3xl font-bold text-[#1A2B4C]">
                Crear Cuenta
            </h1>
            <p class="mt-1 text-xs uppercase tracking-[0.2em] text-[#9B59B6] font-semibold">
                Registro de Chef / Administrador
            </p>
        </div>

        <form method="POST" action="{{ route('register.store') }}" class="space-y-5">
            @csrf

            <!-- NOMBRE -->
            <div>
                <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-[#333333] mb-1.5">
                    Nombre Completo
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-[#9B59B6]">
                        <i class="bi bi-person"></i>
                    </div>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        maxlength="100"
                        placeholder="Ej. Chef Antoine Laurent"
                        class="block w-full pl-11 pr-4 py-3 bg-[#FAF8F5] border @error('name') border-red-500 @else border-[#E0D9CE] @enderror rounded-lg text-sm text-[#333333] focus:outline-none focus:ring-2 focus:ring-[#9B59B6]/40 focus:border-[#9B59B6]"
                    >
                </div>
                @error('name')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- EMAIL -->
            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#333333] mb-1.5">
                    Correo Electrónico
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-[#9B59B6]">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        maxlength="150"
                        placeholder="chef@palais.com"
                        class="block w-full pl-11 pr-4 py-3 bg-[#FAF8F5] border @error('email') border-red-500 @else border-[#E0D9CE] @enderror rounded-lg text-sm text-[#333333] focus:outline-none focus:ring-2 focus:ring-[#9B59B6]/40 focus:border-[#9B59B6]"
                    >
                </div>
                @error('email')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- CONTRASEÑA -->
            <div>
                <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-[#333333] mb-1.5">
                    Contraseña
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-[#9B59B6]">
                        <i class="bi bi-lock"></i>
                    </div>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        placeholder="Mínimo 12 caracteres (mayús, núm, símb)"
                        class="block w-full pl-11 pr-4 py-3 bg-[#FAF8F5] border @error('password') border-red-500 @else border-[#E0D9CE] @enderror rounded-lg text-sm text-[#333333] focus:outline-none focus:ring-2 focus:ring-[#9B59B6]/40 focus:border-[#9B59B6]"
                    >
                </div>
                @error('password')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- CONFIRMAR CONTRASEÑA -->
            <div>
                <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-wider text-[#333333] mb-1.5">
                    Confirmar Contraseña
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-[#9B59B6]">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        placeholder="Repita la contraseña"
                        class="block w-full pl-11 pr-4 py-3 bg-[#FAF8F5] border border-[#E0D9CE] rounded-lg text-sm text-[#333333] focus:outline-none focus:ring-2 focus:ring-[#9B59B6]/40 focus:border-[#9B59B6]"
                    >
                </div>
            </div>

            <!-- BOTÓN REGISTRAR -->
            <div class="pt-2">
                <button
                    type="submit"
                    class="w-full py-3.5 px-6 rounded-lg btn-purple-gradient text-white font-medium text-base shadow-md hover:shadow-lg transition-all"
                >
                    Registrar Cuenta
                </button>
            </div>

        </form>

        <div class="mt-6 pt-6 border-t border-[#F0EBE1] text-center">
            <p class="text-xs text-gray-500">
                ¿Ya posee credenciales activas?
                <a href="{{ route('login') }}" class="font-medium text-[#9B59B6] hover:underline ml-1">
                    Iniciar sesión aquí
                </a>
            </p>
        </div>

    </div>

</div>

@endsection

@extends('layouts.app')

@section('title', 'Contacto en Colombia - El Legado ProRecetas')

@section('content')

<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto min-h-screen bg-[#FDFBF7]">

    <!-- CABECERA -->
    <div class="text-center max-w-2xl mx-auto mb-10">
        <span class="text-xs uppercase tracking-[0.25em] text-[#9B59B6] font-semibold">
            Atención al Usuario &bull; Colombia
        </span>
        <h1 class="mt-2 font-serif text-3xl sm:text-4xl lg:text-5xl font-bold text-[#1A2B4C] tracking-tight">
            Póngase en Contacto
        </h1>
        <div class="mt-3 flex items-center justify-center space-x-2">
            <div class="h-px bg-gradient-to-r from-transparent via-[#D4AF37]/60 to-transparent w-24"></div>
            <div class="w-1.5 h-1.5 rotate-45 bg-[#D4AF37]"></div>
            <div class="h-px bg-gradient-to-r from-transparent via-[#D4AF37]/60 to-transparent w-24"></div>
        </div>
        <!-- TEXTO REQUERIDO ORIENTADO A COLOMBIA -->
        <p class="mt-3 text-sm text-[#555555] font-light">
            Déjanos tus sugerencias, quejas o solicita ayuda con la plataforma. Nuestro equipo en Colombia te responderá.
        </p>
    </div>

    <!-- MENSAJE DE ÉXITO VISUAL ORIENTADO A COLOMBIA -->
    @if(session('status'))
        <div class="mb-8 p-4 rounded-xl bg-emerald-50 border-l-4 border-emerald-600 text-emerald-900 text-sm shadow-sm flex items-center gap-3">
            <i class="bi bi-check-circle-fill text-emerald-600 text-lg"></i>
            <div>
                <strong>¡Mensaje recibido!</strong>
                <p>{{ session('status') }}</p>
            </div>
        </div>
    @endif

    <!-- CONTENEDOR EN 2 COLUMNAS (INFORMACIÓN COLOMBIA + FORMULARIO FUNCIONAL) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- INFORMACIÓN EN COLOMBIA (4 COLUMNAS) -->
        <div class="card-elevation lg:col-span-4 bg-gradient-to-br from-[#1A2B4C] to-[#121F37] text-white rounded-3xl p-8 shadow-lg border border-[#D4AF37]/30">
            <div class="flex items-center space-x-3 mb-6">
                <div class="p-2.5 rounded-xl bg-[#243B68] border border-[#D4AF37]/50 shadow-inner">
                    <i class="bi bi-shield-check text-[#D4AF37] text-xl"></i>
                </div>
                <div>
                    <h3 class="font-serif text-lg font-bold text-[#FDFBF7]">El Legado</h3>
                    <p class="text-[10px] uppercase tracking-widest text-[#D4AF37]">Atención Colombia</p>
                </div>
            </div>

            <div class="space-y-5 text-xs text-gray-300">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-[#D4AF37] mb-1">
                        <i class="bi bi-geo-alt mr-1"></i> Sede Principal Colombia
                    </p>
                    <p class="text-[#FDFBF7] leading-relaxed">
                        Carrera 7 # 65-42<br>
                        Distrito Gastronómico &bull; Bogotá, Colombia
                    </p>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-[#D4AF37] mb-1">
                        <i class="bi bi-clock mr-1"></i> Horario de Soporte
                    </p>
                    <p class="text-[#FDFBF7] leading-relaxed">
                        Lunes a Viernes: 8:00 a.m. - 6:00 p.m. (Hora Colombia)<br>
                        Sábados: 9:00 a.m. - 1:00 p.m.
                    </p>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-[#D4AF37] mb-1">
                        <i class="bi bi-telephone mr-1"></i> Línea Telefónica Nacional
                    </p>
                    <p class="text-[#FDFBF7] font-mono text-sm">+57 (601) 310-8590</p>
                    <p class="text-[11px] text-gray-400 mt-0.5">contacto@ellegadocolombia.com</p>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-white/10 text-xs text-gray-400 italic">
                “Cuidamos el sabor de nuestra tierra y la experiencia de nuestra comunidad en cada rincón de Colombia.”
            </div>
        </div>

        <!-- FORMULARIO DE CONTACTO (8 COLUMNAS) -->
        <div class="card-elevation lg:col-span-8 bg-white rounded-3xl p-8 sm:p-10 shadow-lg border border-[#E8E2D7]">
            <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                @csrf

                <!-- CAMPO: NOMBRE -->
                <div>
                    <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-[#333333] mb-1.5">
                        Nombre Completo <span class="text-[#9B59B6]">*</span>
                    </label>
                    <div class="relative rounded-lg shadow-xs">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-[#9B59B6]">
                            <i class="bi bi-person text-lg"></i>
                        </div>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            placeholder="Ej. Sofia Camargo"
                            class="block w-full pl-11 pr-4 py-3 bg-[#FAF8F5] border @error('name') border-red-500 @else border-[#E0D9CE] @enderror rounded-xl text-sm text-[#333333] focus:outline-none focus:ring-2 focus:ring-[#9B59B6]/40 focus:border-[#9B59B6] transition-all"
                        >
                    </div>
                    @error('name')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CAMPO: CORREO -->
                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-[#333333] mb-1.5">
                        Correo Electrónico <span class="text-[#9B59B6]">*</span>
                    </label>
                    <div class="relative rounded-lg shadow-xs">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-[#9B59B6]">
                            <i class="bi bi-envelope text-lg"></i>
                        </div>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            placeholder="sofia@ejemplo.com.co"
                            class="block w-full pl-11 pr-4 py-3 bg-[#FAF8F5] border @error('email') border-red-500 @else border-[#E0D9CE] @enderror rounded-xl text-sm text-[#333333] focus:outline-none focus:ring-2 focus:ring-[#9B59B6]/40 focus:border-[#9B59B6] transition-all"
                        >
                    </div>
                    @error('email')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- CAMPO: MENSAJE (TEXTAREA) -->
                <div>
                    <label for="message" class="block text-xs font-semibold uppercase tracking-wider text-[#333333] mb-1.5">
                        Mensaje (Sugerencias, quejas o solicitud de ayuda) <span class="text-[#9B59B6]">*</span>
                    </label>
                    <div class="relative rounded-lg shadow-xs">
                        <textarea
                            id="message"
                            name="message"
                            rows="5"
                            required
                            placeholder="Escribe aquí tus comentarios, sugerencias sobre las recetas colombianas o solicita soporte..."
                            class="block w-full p-4 bg-[#FAF8F5] border @error('message') border-red-500 @else border-[#E0D9CE] @enderror rounded-xl text-sm text-[#333333] focus:outline-none focus:ring-2 focus:ring-[#9B59B6]/40 focus:border-[#9B59B6] transition-all resize-none"
                        >{{ old('message') }}</textarea>
                    </div>
                    @error('message')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- BOTÓN ENVIAR MENSAJE CON ICONO DE AVIÓN DE PAPEL (SIN EMOJIS) -->
                <div class="pt-2">
                    <button
                        type="submit"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 py-3.5 rounded-xl btn-purple-gradient text-white font-medium text-sm shadow-md hover:shadow-lg transition-all"
                    >
                        <span>Enviar Mensaje</span>
                        <i class="bi bi-send transform -rotate-12"></i>
                    </button>
                </div>

            </form>
        </div>

    </div>

</div>

@endsection

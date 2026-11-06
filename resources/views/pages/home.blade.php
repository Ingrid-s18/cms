@extends('layouts.app')

@section('title', 'El Legado ProRecetas - CMS')

@section('content')

<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto min-h-[calc(100vh-5rem)] bg-[#FDFBF7]">

    <!-- 1. ENCABEZADO SUPERIOR & MENSAJE DE BIENVENIDA PERSONALIZADO -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#1A2B4C] via-[#20345B] to-[#121F37] text-white p-8 sm:p-12 shadow-xl border border-[#D4AF37]/35 mb-12">
        <div class="relative z-10 max-w-3xl">
            <!-- ENCABEZADO SUPERIOR REQUERIDO: "Portal Gastronómico Oficial" -->
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-[#FAF6ED]/10 border border-[#D4AF37]/40 text-[#D4AF37] text-xs font-semibold uppercase tracking-widest mb-4">
                <i class="bi bi-shield-check text-[#D4AF37]"></i>
                <span>Portal Gastronómico Oficial</span>
            </div>

            <!-- MENSAJE DE BIENVENIDA REQUERIDO: "Bienvenido de nuevo, Sofia" -->
            <h1 class="font-serif text-3xl sm:text-5xl font-bold text-[#FDFBF7] tracking-tight leading-tight">
                Bienvenido de nuevo, <span class="text-[#D4AF37]">Sofia</span>
            </h1>

            <!-- SUBTÍTULO / DESCRIPCIÓN REQUERIDA -->
            <p class="mt-3 text-sm sm:text-base text-gray-300 leading-relaxed font-light">
                Aquí vas a encontrar distintas recetas de chef reconocidos &bull; Acceso al sistema de gestión culinaria y carta gastronómica de temporada.
            </p>

            <!-- LEMA DESTACADO REQUERIDO -->
            <div class="mt-6 pt-6 border-t border-white/10 flex items-start gap-3">
                <span class="text-2xl font-serif text-[#D4AF37] leading-none select-none">“</span>
                <p class="font-serif italic text-base sm:text-lg text-amber-100/90 leading-relaxed">
                    Un chef no se mide por los platos que sirvió, pero si por las recetas que dejo para que otros sigan cocinando
                </p>
            </div>
        </div>
    </div>

    <!-- 2. PLATO DESTACADO COLOMBIANO: AJIACO SANTAFEREÑO TRADICIONAL -->
    <div class="mb-14">
        <div class="flex items-center justify-between mb-6 pb-3 border-b border-[#E8E2D7]">
            <div>
                <div class="flex items-center gap-2">
                    <i class="bi bi-star-fill text-[#D4AF37] text-sm"></i>
                    <!-- CAMBIO DE SECCIÓN REQUERIDO: "Sugerencia de recetas más solicitadas" -->
                    <span class="text-xs uppercase tracking-[0.25em] text-[#9B59B6] font-semibold">
                        Sugerencia de recetas más solicitadas
                    </span>
                </div>
                <h2 class="font-serif text-2xl sm:text-3xl font-bold text-[#1A2B4C] mt-1">
                    Plato Tradicional Destacado
                </h2>
            </div>
            <a href="{{ route('posts.index') }}" class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-[#9B59B6] hover:text-[#7D3C98]">
                <span>Ver Menú Completo</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="bg-white rounded-3xl border border-[#E8E2D7] shadow-lg card-elevation p-6 sm:p-8 flex flex-col lg:flex-row items-center gap-8">
            <div class="relative flex-shrink-0">
                <div class="w-44 h-44 sm:w-52 sm:h-52 rounded-full overflow-hidden border-4 border-[#D4AF37] shadow-xl ring-8 ring-[#FAF6ED]">
                    <img 
                        src="{{ asset('images/ajiaco-santafereno.jpg') }}" 
                        alt="Ajiaco Santafereño Tradicional" 
                        class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-700"
                        onerror="this.onerror=null; this.src='https://upload.wikimedia.org/wikipedia/commons/0/05/Ajiaco_in_Bogot%C3%A1.jpg';"
                    >
                </div>
                <span class="absolute bottom-2 right-2 bg-[#1A2B4C] text-[#D4AF37] px-3.5 py-1 rounded-full text-xs font-serif font-bold shadow-md border border-[#D4AF37]/50">
                    Receta Insignia
                </span>
            </div>

            <div class="flex-1 text-center lg:text-left">
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-2.5 mb-2">
                    <span class="text-xs uppercase tracking-wider font-semibold text-[#9B59B6] bg-[#9B59B6]/10 px-3 py-1 rounded-full">
                        Tradición Colombiana
                    </span>
                    <span class="text-xs text-gray-400">&bull;</span>
                    <span class="text-xs text-emerald-800 bg-emerald-50 px-2.5 py-0.5 rounded-full font-medium border border-emerald-200">
                        En Carta
                    </span>
                </div>

                <h3 class="font-serif text-2xl sm:text-3xl font-bold text-[#1A2B4C] leading-snug">
                    Ajiaco Santafereño con Pollo Campesino y Alcaparras
                </h3>

                <p class="mt-3 text-sm sm:text-base text-[#555555] leading-relaxed">
                    Sopa insignia de los Andes colombianos cocinada con tres variedades de papa (criolla, pastusa y sabanera), mazorca tierna y pechuga desmechada con aroma de guascas frescas. Servido tradicionalmente con crema de leche fresca, alcaparras y tajada de aguacate maduro.
                </p>

                <div class="mt-4 pt-4 border-t border-[#F3EFE8] grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs text-[#555555]">
                    <div class="p-3 bg-[#FAF8F5] rounded-xl border border-[#EFE9DF]">
                        <p class="font-semibold text-[#1A2B4C] uppercase tracking-wider text-[11px] mb-1">Acompañamiento Clásico</p>
                        <p class="italic text-[#666666]">Aguacate de origen, arroz blanco campesino y crema agria.</p>
                    </div>
                    <div class="p-3 bg-[#FAF8F5] rounded-xl border border-[#EFE9DF]">
                        <p class="font-semibold text-[#1A2B4C] uppercase tracking-wider text-[11px] mb-1">Receta Rescatada</p>
                        <p class="text-[#666666]">Firma: <strong class="text-[#1A2B4C]">Chef Sofia & Cocineras Tradicionales</strong></p>
                    </div>
                </div>

                <div class="mt-6 flex flex-wrap items-center justify-between gap-4">
                    <div>
                        <span class="text-xs uppercase tracking-wider text-gray-400 block font-medium">Precio Accesible</span>
                        <!-- PRECIO EN COP ACCESIBLE Y MODERADO -->
                        <span class="font-serif text-2xl sm:text-3xl font-bold text-[#1A2B4C]">$ 28.000 COP</span>
                    </div>
                    <a href="{{ route('posts.index') }}" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl btn-purple-gradient text-white text-sm font-semibold shadow-md">
                        <i class="bi bi-book"></i>
                        <span>Explorar en el Menú</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. INFORMACIÓN DEL RESTAURANTE (HORARIOS, UBICACIÓN Y TRADICIÓN) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-2xl p-6 border border-[#E8E2D7] shadow-md card-elevation">
            <div class="flex items-center gap-3 mb-4">
                <div class="p-2.5 rounded-lg bg-[#FAF6ED] border border-[#D4AF37]/50 text-[#D4AF37]">
                    <i class="bi bi-clock text-2xl"></i>
                </div>
                <div>
                    <h3 class="font-serif text-lg font-bold text-[#1A2B4C]">Horarios de Cocina</h3>
                    <p class="text-xs text-gray-400">Servicio de Mesa Tradicional</p>
                </div>
            </div>
            <ul class="space-y-3 text-xs sm:text-sm text-[#555555]">
                <li class="flex justify-between border-b border-[#F3EFE8] pb-2">
                    <span class="font-medium text-[#1A2B4C]">Almuerzo Criollo</span>
                    <span>Mar – Sáb: 11:30 a 16:00</span>
                </li>
                <li class="flex justify-between border-b border-[#F3EFE8] pb-2">
                    <span class="font-medium text-[#1A2B4C]">Cena Tradicional</span>
                    <span>Mar – Sáb: 18:30 a 22:30</span>
                </li>
                <li class="flex justify-between border-b border-[#F3EFE8] pb-2">
                    <span class="font-medium text-[#1A2B4C]">Sancocho Dominical</span>
                    <span>Dom: 11:00 a 18:00</span>
                </li>
                <li class="flex justify-between text-gray-400 pt-1">
                    <span>Lunes</span>
                    <span class="italic">Aprovisionamiento en plaza campesina</span>
                </li>
            </ul>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-[#E8E2D7] shadow-md card-elevation">
            <div class="flex items-center gap-3 mb-4">
                <div class="p-2.5 rounded-lg bg-[#FAF6ED] border border-[#D4AF37]/50 text-[#D4AF37]">
                    <i class="bi bi-geo-alt text-2xl"></i>
                </div>
                <div>
                    <h3 class="font-serif text-lg font-bold text-[#1A2B4C]">Sede Principal</h3>
                    <p class="text-xs text-gray-400">Zona Gastronómica y Tradicional</p>
                </div>
            </div>
            <div class="space-y-3 text-xs sm:text-sm text-[#555555]">
                <p>
                    <strong class="text-[#1A2B4C]">Carrera 7 # 65-42</strong><br />
                    Chapinero &bull; Distrito Culinario<br />
                    Bogotá, Colombia
                </p>
                <div class="pt-2 border-t border-[#F3EFE8]">
                    <p class="text-xs text-gray-400 font-medium">Línea de Atención Colombia:</p>
                    <p class="font-mono text-sm font-semibold text-[#1A2B4C] mt-0.5">+57 (601) 310-8590</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-[#E8E2D7] shadow-md card-elevation flex flex-col justify-between">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="p-2.5 rounded-lg bg-[#FAF6ED] border border-[#D4AF37]/50 text-[#D4AF37]">
                        <i class="bi bi-award text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="font-serif text-lg font-bold text-[#1A2B4C]">El Legado Culinario</h3>
                        <p class="text-xs text-gray-400">Patrimonio y Sazón Autóctona</p>
                    </div>
                </div>
                <p class="text-xs sm:text-sm text-[#555555] leading-relaxed">
                    Rescatamos las recetas ancestrales de las abuelas colombianas, preparando con maíz criollo, ají dulce, panela de trapiche y tubérculos nativos de pequeños cultivadores locales.
                </p>
            </div>
            <div class="mt-4 pt-3 border-t border-[#F3EFE8] flex items-center justify-between text-xs text-[#9B59B6] font-semibold">
                <span>Cocina Auténtica Colombiana</span>
                <span class="text-[#D4AF37] font-bold">&bull; 100% Sabor de Origen</span>
            </div>
        </div>
    </div>

</div>

@endsection

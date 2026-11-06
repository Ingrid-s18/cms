@extends('layouts.app')

@section('title', 'El Legado - Tradición & Nuestra Esencia')

@section('content')

<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto min-h-screen bg-[#FDFBF7]">

    <!-- CABECERA EDITORIAL -->
    <div class="text-center max-w-3xl mx-auto mb-16">
        <!-- TÍTULO SUPERIOR DE LA SECCIÓN REQUERIDO: "Tradición" -->
        <div class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-[#FAF6ED] border border-[#D4AF37]/50 text-[#D4AF37] text-xs font-semibold uppercase tracking-[0.25em] mb-4">
            <i class="bi bi-book text-[#D4AF37]"></i>
            <span>Tradición</span>
        </div>

        <!-- SUBTÍTULO REQUERIDO: "Nuestra Esencia" -->
        <h1 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-bold text-[#1A2B4C] tracking-tight leading-tight">
            Nuestra Esencia
        </h1>

        <div class="mt-4 flex items-center justify-center space-x-3">
            <div class="h-px bg-gradient-to-r from-transparent via-[#D4AF37] to-transparent w-28"></div>
            <div class="w-1.5 h-1.5 rotate-45 bg-[#D4AF37]"></div>
            <div class="h-px bg-gradient-to-r from-transparent via-[#D4AF37] to-transparent w-28"></div>
        </div>

        <!-- TEXTO INTRODUCTORIO REQUERIDO -->
        <p class="mt-4 text-base sm:text-lg text-[#555555] font-light leading-relaxed">
            Conozca la historia, los principios innegociables y la vocación de servicio que dan vida a cada servicio en El Legado
        </p>
    </div>

    <!-- 1. HISTORIA DEL RESTAURANTE "EL LEGADO" (TRADICIÓN CULINARIA COLOMBIANA) -->
    <div class="bg-white rounded-3xl p-8 sm:p-12 border border-[#E8E2D7] shadow-xl mb-16 grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
        <div class="lg:col-span-7 space-y-6">
            <div class="inline-block px-3 py-1 bg-[#9B59B6]/10 text-[#9B59B6] rounded-full text-xs font-semibold uppercase tracking-wider">
                Patrimonio & Sazón de Familia &bull; Desde Colombia
            </div>

            <h2 class="font-serif text-3xl sm:text-4xl font-bold text-[#1A2B4C] leading-snug">
                La Historia de El Legado
            </h2>

            <p class="text-sm sm:text-base text-[#444444] leading-relaxed">
                <strong>El Legado</strong> nació con una misión entrañable: honrar y salvaguardar la memoria culinaria de Colombia. Durante generaciones, en los fogones de barro de Boyacá, los valles del Cauca, las costas pacíficas y caribeñas y las haciendas cafeteras, las madres y abuelas tejieron con paciencia infinita las recetas que hoy definen nuestra identidad nacional.
            </p>

            <p class="text-sm sm:text-base text-[#444444] leading-relaxed">
                Nuestra propuesta rescata esos sabores ancestrales, empleando ingredientes autóctonos como la papa criolla de semilla nativa, el maíz capio, el hogao a fuego sereno, las hojas de plátano para envolvidos y la panela dorada de cañaduzal. Cada receta es un tributo a la sazón de las familias colombianas, elevada con técnicas impecables, vajilla artesanal y el servicio distinguido que caracteriza a nuestra casa.
            </p>

            <div class="pt-4 border-t border-[#F3EFE8] flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-[#FAF6ED] border border-[#D4AF37] flex items-center justify-center text-[#D4AF37]">
                    <i class="bi bi-award text-2xl"></i>
                </div>
                <div>
                    <p class="font-serif text-base font-bold text-[#1A2B4C]">Sofia & Maestros de la Cocina Colombiana</p>
                    <p class="text-xs text-gray-500">Guardianes del Sabor Tradicional &bull; El Legado ProRecetas</p>
                </div>
            </div>
        </div>

        <div class="lg:col-span-5 relative">
            <div class="rounded-2xl overflow-hidden shadow-2xl border-4 border-[#FAF6ED] ring-1 ring-[#D4AF37]/50 aspect-square">
                <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?auto=format&fit=crop&w=800&q=80" alt="Tradición Culinaria Colombiana" class="w-full h-full object-cover">
            </div>
        </div>
    </div>

    <!-- 2. PILARES DE LA TRADICIÓN (TEMÁTICA, FILOSOFÍA Y MISIÓN) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
        
        <!-- Temática -->
        <div class="bg-white rounded-2xl p-8 border border-[#E8E2D7] shadow-md card-elevation flex flex-col justify-between">
            <div>
                <div class="w-14 h-14 rounded-xl bg-[#FAF6ED] border border-[#D4AF37]/50 flex items-center justify-center text-[#D4AF37] mb-6">
                    <i class="bi bi-columns-gap text-3xl"></i>
                </div>
                <span class="text-xs uppercase tracking-wider text-[#9B59B6] font-bold">Herencia Criolla</span>
                <h3 class="font-serif text-2xl font-bold text-[#1A2B4C] mt-1 mb-4">Temática Autóctona</h3>
                <p class="text-sm text-[#555555] leading-relaxed">
                    Un espacio cálido y señorial inspirado en las casonas coloniales de Colombia, donde la elegancia del azul marino y los detalles dorados enmarcan los aromas del café recién tostado y las ollas de barro tradicionales.
                </p>
            </div>
            <div class="mt-6 pt-4 border-t border-[#F3EFE8] text-xs text-[#1A2B4C] font-semibold flex items-center gap-1.5">
                <i class="bi bi-star-fill text-[#D4AF37]"></i>
                <span>Rescate de vajillas y textiles ancestrales</span>
            </div>
        </div>

        <!-- Filosofía -->
        <div class="bg-white rounded-2xl p-8 border border-[#E8E2D7] shadow-md card-elevation flex flex-col justify-between">
            <div>
                <div class="w-14 h-14 rounded-xl bg-purple-50 border border-purple-200 flex items-center justify-center text-[#9B59B6] mb-6">
                    <i class="bi bi-fire text-3xl"></i>
                </div>
                <span class="text-xs uppercase tracking-wider text-[#9B59B6] font-bold">Fuego & Sazón</span>
                <h3 class="font-serif text-2xl font-bold text-[#1A2B4C] mt-1 mb-4">Filosofía de Origen</h3>
                <p class="text-sm text-[#555555] leading-relaxed">
                    Compramos directamente a campesinos, pescadores artesanales y plataneros de las regiones de Colombia. Creemos en los tiempos de cocción lentos, los caldos espesados con papa criolla y el respeto por cada ingrediente de nuestra tierra.
                </p>
            </div>
            <div class="mt-6 pt-4 border-t border-[#F3EFE8] text-xs text-[#1A2B4C] font-semibold flex items-center gap-1.5">
                <i class="bi bi-star-fill text-[#D4AF37]"></i>
                <span>Trazabilidad campesina 100% colombiana</span>
            </div>
        </div>

        <!-- Misión -->
        <div class="bg-white rounded-2xl p-8 border border-[#E8E2D7] shadow-md card-elevation flex flex-col justify-between">
            <div>
                <div class="w-14 h-14 rounded-xl bg-amber-50 border border-amber-200 flex items-center justify-center text-[#D4AF37] mb-6">
                    <i class="bi bi-bullseye text-3xl"></i>
                </div>
                <span class="text-xs uppercase tracking-wider text-[#9B59B6] font-bold">Vocación de Servicio</span>
                <h3 class="font-serif text-2xl font-bold text-[#1A2B4C] mt-1 mb-4">Nuestra Misión</h3>
                <p class="text-sm text-[#555555] leading-relaxed">
                    Preservar el legado gastronómico colombiano poniendo a disposición de comensales y cocineros las recetas emblemáticas del país, brindando una experiencia culinaria accesible, generosa, fraterna e inolvidable.
                </p>
            </div>
            <div class="mt-6 pt-4 border-t border-[#F3EFE8] text-xs text-[#1A2B4C] font-semibold flex items-center gap-1.5">
                <i class="bi bi-star-fill text-[#D4AF37]"></i>
                <span>Hospitalidad y calidez de hogar</span>
            </div>
        </div>

    </div>

</div>

@endsection

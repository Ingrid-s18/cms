@extends('layouts.app')

@section('title', 'El Legado ProRecetas - Menú de Alta Cocina')

@section('content')

@php
    // Fotografías de recetas tradicionales colombianas
    $dishImages = [
        'https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=500&q=80', // Ajiaco
        'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?auto=format&fit=crop&w=500&q=80', // Carne/Bandeja
        'https://images.unsplash.com/photo-1541832676-9b763b0239ab?auto=format&fit=crop&w=500&q=80', // Sopa/Sancocho
        'https://images.unsplash.com/photo-1534422298391-e4f8c172dddb?auto=format&fit=crop&w=500&q=80', // Cazuela
        'https://images.unsplash.com/photo-1544025162-d76694265947?auto=format&fit=crop&w=500&q=80', // Sobrebarriga
        'https://images.unsplash.com/photo-1579372786545-d24232daf58c?auto=format&fit=crop&w=500&q=80', // Postre
    ];

    // Precios accesibles y moderados en Pesos Colombianos (COP) para recetas tradicionales
    $dishPricesCOP = [
        1 => '$ 28.000',
        2 => '$ 34.000',
        3 => '$ 26.000',
        4 => '$ 36.000',
        5 => '$ 29.000',
        6 => '$ 14.000',
    ];
@endphp

<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto min-h-screen bg-[#FDFBF7]">

    <!-- CABECERA DE GESTIÓN Y BOTÓN PRINCIPAL "Crear / Añadir Nuevo Plato" -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 pb-8 border-b border-[#E8E2D7]">
        <div>
            <div class="flex items-center gap-2">
                <i class="bi bi-cup-hot text-[#9B59B6]"></i>
                <!-- ENCABEZADO SUPERIOR REQUERIDO -->
                <span class="text-xs uppercase tracking-[0.25em] text-[#9B59B6] font-semibold">
                    Carta Culinaria Oficial &bull; Temporada 2026
                </span>
            </div>
            <!-- TÍTULO PRINCIPAL REQUERIDO -->
            <h1 class="mt-1 font-serif text-3xl sm:text-4xl lg:text-5xl font-bold text-[#1A2B4C] tracking-tight">
                Menú de Alta Cocina
            </h1>
            <!-- TEXTO DESCRIPTIVO REQUERIDO -->
            <p class="mt-2 text-sm sm:text-base text-[#555555] max-w-2xl font-light">
                Consulte las creaciones y recetas de la carta gastronómica. Precios expresados estrictamente en Pesos Colombianos (COP).
            </p>
        </div>

        <!-- BOTÓN DE ACCIÓN: "Crear / Añadir Nuevo Plato" -->
        <div>
            @auth
                <a href="{{ route('posts.create') }}" 
                   class="inline-flex items-center gap-2.5 px-5 py-3 rounded-xl btn-purple-gradient text-white text-sm font-semibold shadow-lg hover:shadow-xl border border-[#D4AF37]/50"
                   title="Añadir una nueva receta colombiana">
                    <i class="bi bi-plus-lg"></i>
                    <span>Crear / Añadir Nuevo Plato</span>
                </a>
            @else
                <a href="{{ route('login') }}" 
                   class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#FAF6ED] border border-[#D4AF37]/50 text-xs font-semibold text-[#1A2B4C]">
                    <i class="bi bi-person-lock text-[#9B59B6]"></i>
                    <span>Inicie sesión para añadir platos</span>
                </a>
            @endauth
        </div>
    </div>

    <!-- SUBTÍTULO DE LA LISTA REQUERIDO -->
    <div class="mt-6 p-4 rounded-2xl bg-white border border-[#E8E2D7] shadow-xs flex items-center justify-between">
        <p class="text-xs sm:text-sm text-[#444444] font-medium">
            Carta oficial - Menú de alta cocina. Consulta las creaciones y recetas de nuestros chefs.
        </p>
        <span class="text-xs font-semibold text-[#9B59B6] bg-[#9B59B6]/10 px-3 py-1 rounded-full">
            Recetas Tradicionales de Colombia
        </span>
    </div>

    <!-- MENSAJE DE ESTADO (ALERT) -->
    @if(session('status'))
        <div class="mt-6 p-4 rounded-xl bg-emerald-50 border-l-4 border-emerald-600 text-emerald-900 text-sm shadow-sm flex items-center justify-between">
            <div class="flex items-center gap-2">
                <i class="bi bi-check-circle-fill text-emerald-600 text-base"></i>
                <span>{{ session('status') }}</span>
            </div>
        </div>
    @endif

    <!-- CUADRÍCULA (GRID) DE RECETAS TRADICIONALES COLOMBIANAS -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($posts as $index => $post)
            @php
                // Obtener la imagen correspondiente del plato:
                // 1. Imagen subida por el usuario
                // 2. O imagen del plato tradicional (Sancocho, Churrasco, Arroz con Pollo, Bandeja Paisa, etc.)
                $dishImage = $post->image_url;

                // Precio formateado en Pesos Colombianos (COP)
                if (!empty($post->price)) {
                    $priceCOP = '$ ' . number_format($post->price, 0, ',', '.') . ' COP';
                } else {
                    $priceCOP = $dishPricesCOP[$post->id] ?? ('$ ' . number_format(24000 + ($post->id * 2000), 0, ',', '.') . ' COP');
                }

                $categoryName = $post->category ?? 'Platos Fuertes';
            @endphp

            <div class="card-elevation group bg-white rounded-2xl p-6 border border-[#E8E2D7] shadow-md flex flex-col justify-between">
                
                <div>
                    <!-- PARTE SUPERIOR: IMAGEN DINÁMICA CIRCULAR O PLACEHOLDER CON CUBIERTOS -->
                    <div class="flex items-center justify-between gap-4 mb-4">
                        <div class="relative flex-shrink-0">
                            @if($dishImage)
                                {{-- Imagen real subida por el usuario con recorte circular perfecto --}}
                                <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full overflow-hidden border-2 border-[#D4AF37] shadow-md ring-4 ring-[#FAF6ED] group-hover:ring-[#9B59B6]/30 transition-all duration-300 bg-white">
                                    <img 
                                        src="{{ $dishImage }}" 
                                        alt="{{ $post->title }}"
                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500"
                                        loading="lazy"
                                    >
                                </div>
                            @else
                                {{-- Placeholder elegante con icono vectorial de cubiertos (Sin emojis) --}}
                                <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full bg-gradient-to-br from-[#FFFDF7] via-[#FAF6ED] to-[#F3EFE8] border-2 border-[#D4AF37] shadow-md ring-4 ring-[#FAF6ED] group-hover:ring-[#9B59B6]/30 transition-all duration-300 flex items-center justify-center text-[#D4AF37]">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-9 h-9 text-[#D4AF37]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M18 2v6a3 3 0 0 1-3 3 3 3 0 0 1-3-3V2"/>
                                            <path d="M15 2v10"/>
                                            <path d="M15 12v10"/>
                                            <path d="M6 2v20"/>
                                            <path d="M6 2c2.5 0 4 2 4 5s-1.5 5-4 5"/>
                                        </svg>
                                        <span class="text-[9px] uppercase tracking-wider font-semibold text-[#9B59B6] mt-0.5">El Legado</span>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- PRECIO EN COP MODERADO / ACCESIBLE -->
                        <div class="text-right">
                            <span class="text-[10px] uppercase tracking-wider text-gray-400 font-medium block">
                                Precio COP
                            </span>
                            <span class="font-serif text-xl font-bold text-[#1A2B4C] bg-[#FAF8F5] px-2.5 py-1 rounded-lg border border-[#E8E2D7] inline-block shadow-xs">
                                {{ $priceCOP }}
                            </span>
                            <div class="mt-2">
                                <span class="text-[10px] uppercase tracking-wider font-semibold text-[#9B59B6] bg-[#9B59B6]/10 px-2 py-0.5 rounded-full">
                                    {{ $categoryName }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- TÍTULO DEL PLATO -->
                    <h2 class="font-serif text-xl font-bold text-[#1A2B4C] hover:text-[#9B59B6] transition-colors leading-snug">
                        <a href="{{ route('posts.show', $post) }}">
                            {{ $post->title }}
                        </a>
                    </h2>

                    <!-- DESCRIPCIÓN -->
                    <p class="mt-2 text-xs sm:text-sm text-[#555555] leading-relaxed line-clamp-3">
                        {{ $post->body }}
                    </p>
                </div>

                <!-- PARTE INFERIOR: METADATOS Y ACCIONES CRUD SEGÚN PERMISOS -->
                <div class="mt-6 pt-4 border-t border-[#F3EFE8]">
                    <div class="flex items-center justify-between text-xs text-gray-500 mb-3">
                        <span class="truncate max-w-[170px]">
                            Chef: <strong class="text-[#333333]">{{ $post->user->name ?? 'Sofia' }}</strong>
                        </span>
                        <span class="text-[11px] text-gray-400">
                            {{ $post->created_at ? $post->created_at->format('d/m/Y') : 'Receta de Temporada' }}
                        </span>
                    </div>

                    <!-- ACCIONES CRUD: LÓGICA DE PERMISOS -->
                    <div class="flex items-center justify-between pt-1">
                        <!-- Lectura: Global para todos -->
                        <a href="{{ route('posts.show', $post) }}" 
                           class="inline-flex items-center gap-1.5 text-xs font-semibold text-[#1A2B4C] hover:text-[#9B59B6] px-2.5 py-1.5 rounded-lg hover:bg-gray-100 transition-colors">
                            <i class="bi bi-eye"></i>
                            <span>Ver Receta</span>
                        </a>

                        {{-- 
                            PERMISOS CRUD:
                            Solo el usuario creador ve y puede ejecutar Editar y Eliminar.
                            Si no es el dueño, no se muestran los botones.
                        --}}
                        @if(Auth::check() && (Auth::id() === $post->user_id))
                            <div class="flex items-center gap-1.5">
                                <a href="{{ route('posts.edit', $post) }}" 
                                   class="inline-flex items-center gap-1 text-xs font-medium text-gray-700 hover:text-[#1A2B4C] px-2.5 py-1.5 rounded-lg hover:bg-gray-100 border border-gray-200 transition-colors"
                                   title="Editar plato (Autorizado como creador)">
                                    <i class="bi bi-pencil"></i>
                                    <span>Editar</span>
                                </a>

                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('¿Está seguro de retirar esta receta de la carta?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="inline-flex items-center gap-1 text-xs font-semibold text-red-600 hover:text-red-800 px-2.5 py-1.5 rounded-lg hover:bg-red-50 border border-red-200 transition-colors"
                                            title="Eliminar plato (Autorizado como creador)">
                                        <i class="bi bi-trash"></i>
                                        <span>Eliminar</span>
                                    </button>
                                </form>
                            </div>
                        @else
                            <span class="text-[11px] text-gray-400 italic">
                                Receta de otro chef
                            </span>
                        @endif
                    </div>
                </div>

            </div>
        @empty
            <div class="col-span-full bg-white rounded-3xl p-12 text-center border border-[#E8E2D7] shadow-sm">
                <i class="bi bi-journal-x text-5xl text-gray-400"></i>
                <h3 class="mt-4 font-serif text-2xl font-bold text-[#1A2B4C]">Aún no hay recetas registradas</h3>
                <p class="mt-2 text-sm text-gray-500 max-w-md mx-auto">
                    Añada su primera receta colombiana para enriquecer la carta culinaria de El Legado.
                </p>
                @auth
                    <div class="mt-6">
                        <a href="{{ route('posts.create') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl btn-purple-gradient text-white text-sm font-semibold">
                            <i class="bi bi-plus-lg"></i>
                            <span>Crear / Añadir Nuevo Plato</span>
                        </a>
                    </div>
                @endauth
            </div>
        @endforelse
    </div>

</div>

@endsection

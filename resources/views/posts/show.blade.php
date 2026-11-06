@extends('layouts.app')

@section('title', $post->title . ' - El Legado ProRecetas')

@section('content')

@php
    // Obtener imagen dinámica del plato a través del accessor del modelo
    $dishImage = $post->image_url;

    if (!empty($post->price)) {
        $priceCOP = '$ ' . number_format($post->price, 0, ',', '.') . ' COP';
    } else {
        $priceCOP = '$ ' . number_format(24000 + ($post->id * 2000), 0, ',', '.') . ' COP';
    }
@endphp

<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto min-h-screen bg-[#FDFBF7]">

    <!-- BOTÓN VOLVER AL MENÚ -->
    <div class="mb-6">
        <a href="{{ route('posts.index') }}" 
           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white border border-[#E0D9CE] text-sm font-medium text-[#1A2B4C] hover:text-[#9B59B6] hover:border-[#9B59B6] shadow-xs hover:shadow-md transition-all group">
            <i class="bi bi-arrow-left text-[#9B59B6] transform group-hover:-translate-x-1 transition-transform"></i>
            <span>Volver al Menú</span>
        </a>
    </div>

    <!-- TARJETA CENTRADA CON EFECTO DE ELEVACIÓN HOVER -->
    <article class="card-elevation bg-white rounded-3xl overflow-hidden shadow-2xl border border-[#E8E2D7] ring-1 ring-[#D4AF37]/30">
        
        <!-- FOTOGRAFÍA GASTRONÓMICA BANNER -->
        <div class="relative h-72 sm:h-96 w-full overflow-hidden bg-[#1A2B4C] flex items-center justify-center">
            @if($dishImage)
                <img 
                    src="{{ $dishImage }}" 
                    alt="{{ $post->title }}"
                    class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700"
                >
            @else
                <div class="flex flex-col items-center justify-center text-center p-8 text-[#D4AF37]">
                    <svg class="w-20 h-20 text-[#D4AF37] opacity-80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M18 2v6a3 3 0 0 1-3 3 3 3 0 0 1-3-3V2"/>
                        <path d="M15 2v10"/>
                        <path d="M15 12v10"/>
                        <path d="M6 2v20"/>
                        <path d="M6 2c2.5 0 4 2 4 5s-1.5 5-4 5"/>
                    </svg>
                    <p class="font-serif text-lg text-white font-bold mt-2">El Legado ProRecetas</p>
                    <p class="text-xs text-gray-300">Receta tradicional colombiana de alta cocina</p>
                </div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/25 to-transparent pointer-events-none"></div>
            
            <div class="absolute top-6 left-6 flex items-center gap-2">
                <span class="px-3.5 py-1 rounded-full text-xs font-semibold uppercase tracking-wider bg-white/95 text-[#1A2B4C] shadow-md">
                    Cocina Colombiana
                </span>
                <span class="px-3.5 py-1 rounded-full text-xs font-semibold bg-[#9B59B6] text-white shadow-md">
                    El Legado ProRecetas
                </span>
            </div>

            <!-- PRECIO ESTRICTAMENTE EN PESOS COLOMBIANOS (COP) ACCESIBLE -->
            <div class="absolute bottom-6 right-6">
                <span class="font-serif text-2xl sm:text-4xl font-bold text-[#FDFBF7] drop-shadow-md bg-[#1A2B4C]/90 px-5 py-2 rounded-xl border border-[#D4AF37]/70">
                    {{ $priceCOP }}
                </span>
            </div>
        </div>

        <!-- CONTENIDO DETALLADO DE LA TARJETA -->
        <div class="p-8 sm:p-12">
            
            <div class="flex items-center justify-between border-b border-[#F0EBE1] pb-6">
                <div class="flex items-center gap-3">
                    <div class="p-2.5 rounded-xl bg-[#FAF6ED] border border-[#D4AF37]/50">
                        <i class="bi bi-shield-check text-[#D4AF37] text-xl"></i>
                    </div>
                    <div>
                        <span class="text-[11px] uppercase tracking-[0.2em] text-[#D4AF37] font-bold">
                            Ficha Culinaria Oficial
                        </span>
                        <p class="text-xs text-gray-500">Temporada 2026 &bull; Pesos Colombianos (COP)</p>
                    </div>
                </div>

                <div>
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-medium text-emerald-800 bg-emerald-50 border border-emerald-200">
                        ● Disponible en Carta
                    </span>
                </div>
            </div>

            <div class="mt-8">
                <h1 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold text-[#1A2B4C] tracking-tight leading-tight">
                    {{ $post->title }}
                </h1>
            </div>

            <div class="mt-4 flex flex-wrap items-center gap-6 text-sm text-[#666666] pb-6 border-b border-[#F0EBE1]">
                <div class="flex items-center gap-2">
                    <i class="bi bi-person-circle text-[#9B59B6] text-base"></i>
                    <span>
                        Chef Creador: <strong class="text-[#1A2B4C] font-semibold">{{ $post->user->name ?? 'Sofia' }}</strong>
                    </span>
                </div>

                <div class="flex items-center gap-2 text-xs text-gray-400">
                    <i class="bi bi-calendar3"></i>
                    <span>Registrado: {{ $post->created_at ? $post->created_at->format('d/m/Y') : 'Receta de Temporada' }}</span>
                </div>
            </div>

            <div class="mt-8">
                <h3 class="text-xs uppercase tracking-[0.2em] text-[#9B59B6] font-bold mb-3">
                    Descripción Gastronómica & Métodos
                </h3>
                <p class="text-base sm:text-lg text-[#333333] leading-relaxed font-light">
                    {{ $post->body }}
                </p>
            </div>

            <!-- ACCIONES: EDITAR Y ELIMINAR (SOLO PARA EL CREADOR) -->
            <div class="mt-10 pt-6 border-t border-[#F0EBE1] flex flex-wrap items-center justify-between gap-4">
                
                <a href="{{ route('posts.index') }}" 
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#1A2B4C] text-white text-xs font-semibold uppercase tracking-wider hover:bg-[#243B68] transition-colors">
                    <i class="bi bi-arrow-left"></i>
                    <span>Regresar al Menú</span>
                </a>

                @can('update', $post)
                    <div class="flex items-center gap-3">
                        <a href="{{ route('posts.edit', $post) }}" 
                           class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl border border-[#E0D9CE] text-xs font-semibold text-gray-700 hover:text-[#1A2B4C] hover:bg-gray-100 transition-colors">
                            <i class="bi bi-pencil"></i>
                            <span>Editar Receta</span>
                        </a>

                        @can('delete', $post)
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('¿Está seguro de eliminar esta receta permanentemente?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-red-50 text-red-700 border border-red-200 text-xs font-semibold hover:bg-red-100 transition-colors">
                                    <i class="bi bi-trash"></i>
                                    <span>Eliminar Receta</span>
                                </button>
                            </form>
                        @endcan
                    </div>
                @endcan

            </div>

        </div>

    </article>

</div>

@endsection

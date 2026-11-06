@extends('layouts.app')

@section('title', 'Información Culinaria e Institucional')

@section('content')
<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto min-h-screen bg-[#FDFBF7]">
    <div class="card-elevation bg-white rounded-3xl p-8 sm:p-10 shadow-xl border border-[#E8E2D7]">
        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-[#F0EBE1]">
            <div class="p-2.5 rounded-xl bg-[#FAF6ED] border border-[#D4AF37]/50 text-[#D4AF37]">
                <i class="bi bi-info-circle-fill text-2xl"></i>
            </div>
            <div>
                <h1 class="font-serif text-3xl font-bold text-[#1A2B4C]">Información del Sistema Culinario</h1>
                <p class="text-xs text-gray-500">El Legado ProRecetas &bull; CMS</p>
            </div>
        </div>

        <p class="text-sm text-[#444444] leading-relaxed mb-4">
            Plataforma integral diseñada para la gestión, curaduría y presentación de la carta gastronómica de alta cocina, optimizada con una paleta clásica crema/azul marino y controles de acceso estrictos por chef.
        </p>

        <div class="pt-4 border-t border-[#F0EBE1] flex items-center justify-between text-xs text-gray-500">
            <span>Versión 2.0 &bull; 2026</span>
            <a href="{{ route('home') }}" class="text-[#9B59B6] font-semibold hover:underline">Volver a Página Principal</a>
        </div>
    </div>
</div>
@endsection

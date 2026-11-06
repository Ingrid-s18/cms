@extends('layouts.app')

@section('title', 'Seguridad del Portal Culinario')

@section('content')
<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto min-h-screen bg-[#FDFBF7]">
    <div class="card-elevation bg-white rounded-3xl p-8 sm:p-10 shadow-xl border border-[#E8E2D7]">
        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-[#F0EBE1]">
            <div class="p-2.5 rounded-xl bg-[#FAF6ED] border border-[#D4AF37]/50 text-[#D4AF37]">
                <i class="bi bi-shield-lock-fill text-2xl"></i>
            </div>
            <div>
                <h1 class="font-serif text-3xl font-bold text-[#1A2B4C]">Seguridad y Control de Acceso</h1>
                <p class="text-xs text-gray-500">Políticas de integridad y protección de la carta gastronómica</p>
            </div>
        </div>

        <p class="text-sm text-[#444444] leading-relaxed mb-4">
            Este portal gastronómico implementa estándares estrictos de desarrollo seguro, incluyendo autenticación criptográfica, autorización basada en roles (RBAC) y políticas de propiedad donde un Chef solo puede modificar o eliminar los platos creados bajo su autoría.
        </p>

        <div class="p-4 bg-purple-50 rounded-xl border border-purple-200 text-xs text-purple-900 space-y-1">
            <p><strong>Protección CSRF:</strong> Formularios protegidos contra falsificación de peticiones.</p>
            <p><strong>Sanitización de Entradas:</strong> Validación tipada en campos de texto, números y precios en COP.</p>
            <p><strong>Control de Propiedad:</strong> Políticas de Laravel (DishPolicy / PostPolicy) para restringir acciones destructivas.</p>
        </div>
    </div>
</div>
@endsection

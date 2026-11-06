@extends('layouts.app')

@section('title', 'Editar Plato - El Legado ProRecetas - CMS')

@section('content')

<div class="py-12 px-4 sm:px-6 lg:px-8 max-w-3xl mx-auto min-h-screen bg-[#FDFBF7]">

    <div class="mb-6">
        <a href="{{ route('posts.index') }}" 
           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white border border-[#E0D9CE] text-sm font-medium text-[#1A2B4C] hover:text-[#9B59B6] hover:border-[#9B59B6] shadow-xs hover:shadow-md transition-all">
            <i class="bi bi-arrow-left text-[#9B59B6]"></i>
            <span>Volver al Menú</span>
        </a>
    </div>

    <div class="card-elevation bg-white rounded-3xl p-8 sm:p-10 shadow-xl border border-[#E8E2D7]">
        
        <div class="border-b border-[#F0EBE1] pb-6 mb-8">
            <span class="text-xs uppercase tracking-[0.25em] text-[#9B59B6] font-semibold">
                Edición de Carta Gastronómica
            </span>
            <h1 class="mt-2 font-serif text-3xl font-bold text-[#1A2B4C]">
                Editar Plato Culinario
            </h1>
            <p class="mt-1 text-sm text-gray-500">
                Modifique la información técnica de la receta #{{ $post->id }}.
            </p>
        </div>

        <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- TÍTULO -->
            <div>
                <label for="title" class="block text-xs font-semibold uppercase tracking-wider text-[#333333] mb-1.5">
                    Título del Plato <span class="text-[#9B59B6]">*</span>
                </label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $post->title) }}"
                    maxlength="150"
                    required
                    class="block w-full px-4 py-3 bg-[#FAF8F5] border @error('title') border-red-500 @else border-[#E0D9CE] @enderror rounded-xl text-sm text-[#333333] focus:outline-none focus:ring-2 focus:ring-[#9B59B6]/40 focus:border-[#9B59B6] transition-all"
                >
                @error('title')
                    <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- CATEGORÍA Y PRECIO EN COP -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label for="category" class="block text-xs font-semibold uppercase tracking-wider text-[#333333] mb-1.5">
                        Categoría Culinaria
                    </label>
                    <select
                        id="category"
                        name="category"
                        class="block w-full px-4 py-3 bg-[#FAF8F5] border border-[#E0D9CE] rounded-xl text-sm text-[#333333] focus:outline-none focus:ring-2 focus:ring-[#9B59B6]/40 focus:border-[#9B59B6] transition-all"
                    >
                        <option value="Platos Fuertes" {{ old('category', $post->category) == 'Platos Fuertes' ? 'selected' : '' }}>Platos Fuertes</option>
                        <option value="Entradas" {{ old('category', $post->category) == 'Entradas' ? 'selected' : '' }}>Entradas</option>
                        <option value="Especialidades" {{ old('category', $post->category) == 'Especialidades' ? 'selected' : '' }}>Especialidades</option>
                        <option value="Postres" {{ old('category', $post->category) == 'Postres' ? 'selected' : '' }}>Postres</option>
                        <option value="Bebidas Típicas" {{ old('category', $post->category) == 'Bebidas Típicas' ? 'selected' : '' }}>Bebidas Típicas</option>
                    </select>
                </div>

                <div>
                    <label for="price" class="block text-xs font-semibold uppercase tracking-wider text-[#333333] mb-1.5">
                        Precio en Pesos Colombianos (COP)
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-gray-500 text-sm font-semibold pointer-events-none">
                            $
                        </span>
                        <input
                            type="number"
                            id="price"
                            name="price"
                            value="{{ old('price', $post->price ? (int)$post->price : 28000) }}"
                            min="1000"
                            step="500"
                            class="block w-full pl-8 pr-4 py-3 bg-[#FAF8F5] border @error('price') border-red-500 @else border-[#E0D9CE] @enderror rounded-xl text-sm text-[#333333] focus:outline-none focus:ring-2 focus:ring-[#9B59B6]/40 focus:border-[#9B59B6] transition-all"
                        >
                    </div>
                    @error('price')
                        <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- FOTOGRAFÍA DEL PLATO (ACTUAL Y NUEVA SUBIDA) -->
            <div>
                <label for="imagen" class="block text-xs font-semibold uppercase tracking-wider text-[#333333] mb-1.5">
                    Fotografía del Plato
                </label>
                <div class="relative border-2 border-dashed border-[#D4AF37]/60 hover:border-[#9B59B6] bg-[#FAF8F5] rounded-2xl p-6 transition-all group">
                    <input
                        type="file"
                        id="imagen"
                        name="imagen"
                        accept="image/*"
                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                        onchange="previewEditImage(this)"
                    >
                    <div class="flex flex-col sm:flex-row items-center gap-5 text-center sm:text-left">
                        <div id="image-preview-wrapper" class="w-24 h-24 rounded-full overflow-hidden border-2 border-[#D4AF37] shadow-md ring-4 ring-white bg-white flex items-center justify-center flex-shrink-0">
                            @if($post->imagen)
                                @php
                                    $currentImg = (str_starts_with($post->imagen, 'http://') || str_starts_with($post->imagen, 'https://'))
                                        ? $post->imagen
                                        : asset('storage/' . $post->imagen);
                                @endphp
                                <img id="image-preview" src="{{ $currentImg }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                                <i id="image-placeholder-icon" class="bi bi-camera text-3xl text-[#D4AF37] hidden"></i>
                            @else
                                <i id="image-placeholder-icon" class="bi bi-camera text-3xl text-[#D4AF37]"></i>
                                <img id="image-preview" src="#" alt="Previsualización" class="hidden w-full h-full object-cover">
                            @endif
                        </div>
                        <div class="flex-1">
                            <p class="font-serif font-bold text-sm text-[#1A2B4C] group-hover:text-[#9B59B6] transition-colors">
                                {{ $post->imagen ? 'Cambiar fotografía del plato' : 'Subir fotografía real del plato' }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                Haga clic para seleccionar una nueva imagen si desea reemplazarla (JPG, PNG, WEBP, AVIF).
                            </p>
                            <span id="file-name-label" class="inline-block mt-2 text-[11px] font-semibold text-[#9B59B6] bg-[#9B59B6]/10 px-2.5 py-0.5 rounded-full">
                                {{ $post->imagen ? 'Fotografía actual cargada' : 'Sin imagen personalizada' }}
                            </span>
                        </div>
                    </div>
                </div>
                @error('imagen')
                    <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- CONTENIDO / DESCRIPCIÓN -->
            <div>
                <label for="body" class="block text-xs font-semibold uppercase tracking-wider text-[#333333] mb-1.5">
                    Descripción Gastronómica <span class="text-[#9B59B6]">*</span>
                </label>
                <textarea
                    id="body"
                    name="body"
                    rows="5"
                    maxlength="10000"
                    required
                    class="block w-full p-4 bg-[#FAF8F5] border @error('body') border-red-500 @else border-[#E0D9CE] @enderror rounded-xl text-sm text-[#333333] focus:outline-none focus:ring-2 focus:ring-[#9B59B6]/40 focus:border-[#9B59B6] transition-all resize-none"
                >{{ old('body', $post->body) }}</textarea>
                @error('body')
                    <p class="mt-1 text-xs text-red-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- PERMISOS DE AUTORÍA -->
            <div class="p-4 bg-purple-50 rounded-xl border border-purple-200 text-xs text-purple-900 flex items-start gap-2.5">
                <i class="bi bi-shield-check text-[#9B59B6] text-base"></i>
                <div>
                    <strong>Autorización comprobada:</strong> Estás editando este plato porque fue creado por tu cuenta (<strong>{{ $post->user->name ?? 'Chef' }}</strong>).
                </div>
            </div>

            <!-- BOTONES DE ACCIÓN -->
            <div class="flex items-center justify-end gap-4 pt-4 border-t border-[#F0EBE1]">
                <a href="{{ route('posts.index') }}" 
                   class="px-5 py-2.5 rounded-xl border border-[#E0D9CE] text-xs font-semibold text-gray-600 hover:bg-gray-100 transition-colors">
                    Cancelar
                </a>
                <button
                    type="submit"
                    class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl btn-purple-gradient text-white text-xs font-bold uppercase tracking-wider shadow-md hover:shadow-lg transition-all"
                >
                    <i class="bi bi-check2"></i>
                    <span>Guardar Cambios</span>
                </button>
            </div>

        </form>

    </div>

</div>

<script>
    function previewEditImage(input) {
        const preview = document.getElementById('image-preview');
        const icon = document.getElementById('image-placeholder-icon');
        const label = document.getElementById('file-name-label');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                if (icon) icon.classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
            label.textContent = input.files[0].name;
        }
    }
</script>

    </div>

</div>

@endsection

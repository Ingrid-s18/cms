@extends('layouts.app')

@section('title', 'Crear publicación')

@section('content')

<div class="page-content">

    <h1>Crear publicación</h1>

    <form method="POST" action="{{ route('posts.store') }}">

        @csrf

        <div>
            <label for="title">Título</label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title') }}"
                maxlength="150"
                required
            >

            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="body">Contenido</label>
            <textarea
                id="body"
                name="body"
                maxlength="10000"
                required
            >{{ old('body') }}</textarea>

            @error('body')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">
            Guardar publicación
        </button>

    </form>

    <br>

    <a href="{{ route('posts.index') }}">
        Volver a publicaciones
    </a>

</div>

@endsection
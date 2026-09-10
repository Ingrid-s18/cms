@extends('layouts.app')

@section('title', 'Editar publicación')

@section('content')

<div class="page-content">

    <h1>Editar publicación</h1>

    <form method="POST" action="{{ route('posts.update', $post) }}">

        @csrf
        @method('PATCH')

        <div>
            <label for="title">Título</label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $post->title) }}"
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
            >{{ old('body', $post->body) }}</textarea>

            @error('body')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">
            Actualizar publicación
        </button>

    </form>

    <br>

    <a href="{{ route('posts.show', $post) }}">
        Cancelar
    </a>

</div>

@endsection
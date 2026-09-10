@extends('layouts.app')

@section('title', $post->title)

@section('content')

<div class="page-content">

    <h1>{{ $post->title }}</h1>

    <p>{{ $post->body }}</p>

    <p>
        Autor: {{ $post->user->name }}
    </p>

    <p>
        Publicado: {{ $post->created_at->format('d/m/Y H:i') }}
    </p>

    @can('update', $post)
        <a href="{{ route('posts.edit', $post) }}">
            Editar
        </a>
    @endcan

    @can('delete', $post)
        <form
            method="POST"
            action="{{ route('posts.destroy', $post) }}"
            style="display:inline;"
        >
            @csrf
            @method('DELETE')

            <button type="submit">
                Eliminar
            </button>
        </form>
    @endcan

    <br><br>

    <a href="{{ route('posts.index') }}">
        Volver a publicaciones
    </a>

</div>

@endsection
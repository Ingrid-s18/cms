@extends('layouts.app')

@section('title', 'Publicaciones')

@section('content')

<div class="page-content">

    <h1>Publicaciones</h1>

    <a href="{{ route('posts.create') }}">
        Crear publicación
    </a>

    @if ($posts->isEmpty())

        <p>No hay publicaciones todavía.</p>

    @else

        @foreach ($posts as $post)

            <article>
                <h2>{{ $post->title }}</h2>

                <p>{{ $post->body }}</p>

                <p>
                    Autor: {{ $post->user->name }}
                </p>

                <a href="{{ route('posts.show', $post) }}">
                    Ver publicación
                </a>
            </article>

            <hr>

        @endforeach

    @endif

</div>

@endsection
@extends('layouts.app')

@section('title', 'Publicaciones')

@section('content')

<div class="page-container">

    <div class="page-card">

        <!-- TÍTULO -->

        <h1>
            Publicaciones de los aventureros
        </h1>

        <p>
            Aquí puedes ver, crear y administrar todas las publicaciones
            de tus aventuras de una manera segura.
        </p>

        <!-- BOTÓN CREAR -->

        <div class="posts-header">

            <a href="{{ route('posts.create') }}" class="btn-primary">
                ＋ Crear Nueva Publicación
            </a>

        </div>


        <!-- MENSAJE -->

        @if(session('status'))

            <div class="message message-success">
                {{ session('status') }}
            </div>

        @endif


        <!-- PUBLICACIONES -->

        @if($posts->count())

            <div class="posts-container">

                @foreach($posts as $post)

                    <div class="post-card">


                        <!-- INFORMACIÓN DE LA PUBLICACIÓN -->

                        <div class="post-information">

                            <h2>
                                {{ $post->title }}
                            </h2>

                            <p>
                                {{ $post->body }}
                            </p>

                            <small>
                                Publicado por:
                                <strong>
                                    {{ $post->user->name }}
                                </strong>
                            </small>

                        </div>


                        <!-- ACCIONES -->

                        <div class="post-actions">

                            <a
                                href="{{ route('posts.show', $post) }}"
                                class="action-link"
                            >
                                Ver
                            </a>


                            @can('update', $post)

                                <a
                                    href="{{ route('posts.edit', $post) }}"
                                    class="action-link"
                                >
                                    Editar
                                </a>

                            @endcan


                            @can('delete', $post)

                                <form
                                    action="{{ route('posts.destroy', $post) }}"
                                    method="POST"
                                    class="delete-form"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="delete-link"
                                    >
                                        Eliminar
                                    </button>

                                </form>

                            @endcan

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty-posts">

                <div class="page-icon">
                    📝
                </div>

                <h2>
                    No hay publicaciones
                </h2>

                <p>
                    No hay publicaciones disponibles todavía.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection
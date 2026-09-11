@extends('layouts.app')

@section('title', 'Página principal')

@section('content')

<div class="page-content">

    <h1>Bienvenido a tu nuevo mundo</h1>

    <p>
        Has iniciado sesión correctamente en este portal.
    </p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>

</div>

@endsection
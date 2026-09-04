@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <h1>Bienvenido al Dashboard</h1>

    <p>
        Has iniciado sesión correctamente.
    </p>

    <form method="POST" action="{{ route('logout') }}">

        @csrf

        <button type="submit">
            Cerrar sesión
        </button>

    </form>

@endsection
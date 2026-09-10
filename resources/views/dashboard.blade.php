@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="page-content">

    <h1>Bienvenido al Dashboard</h1>

    <p>
        Has iniciado sesión correctamente.
    </p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>

</div>

@endsection
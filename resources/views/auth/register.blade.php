@extends('layouts.app')

@section('title', 'Registro')

@section('content')

    <h1>Crear cuenta</h1>

    <form method="POST" action="{{ route('register.store') }}">

        @csrf

        <div>
            <label for="name">Nombre</label>

            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                maxlength="100"
            >

            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email">Correo electrónico</label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                maxlength="150"
            >

            @error('email')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password">Contraseña</label>

            <input
                id="password"
                type="password"
                name="password"
                required
            >

            @error('password')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation">
                Confirmar contraseña
            </label>

            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required
            >
        </div>

        <button type="submit">
            Registrarme
        </button>

    </form>

@endsection
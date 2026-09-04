@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')

    <h1>Iniciar sesión</h1>

    <form method="POST" action="{{ route('login.store') }}">

        @csrf

        <div>
            <label for="email">Correo electrónico</label>

            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                maxlength="150"
                autocomplete="email"
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
                autocomplete="current-password"
            >

            @error('password')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>
                <input
                    type="checkbox"
                    name="remember"
                    value="1"
                >

                Recordarme
            </label>
        </div>

        <button type="submit">
            Iniciar sesión
        </button>

    </form>

@endsection
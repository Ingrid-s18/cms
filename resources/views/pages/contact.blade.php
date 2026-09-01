@extends('layouts.app')

@section('title', 'Contacto')

@section('content')

    <h1>Contacto</h1>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('contact.send') }}">

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
            <label for="message">Mensaje</label>
            <textarea
                id="message"
                name="message"
                required
                maxlength="2000"
            >{{ old('message') }}</textarea>

            @error('message')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">
            Enviar
        </button>

    </form>

@endsection
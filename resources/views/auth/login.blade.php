@extends('layouts.app')

@section('title', 'Portal Seguro')

@section('content')

<div class="login-page">

    <div class="login-card">

        <div class="login-icon">
            <i class="bi bi-shield-lock"></i>
        </div>

        <h1>Portal Seguro</h1>

        <p class="login-subtitle">
            Inicia sesión para continuar a tu cuenta
        </p>

        <form method="POST" action="{{ route('login.store') }}">

            @csrf

            <div class="form-group">

                <label for="email">
                    Correo electrónico
                </label>

                <div class="input-wrapper">

                    <span class="input-icon">
                        <i class="bi bi-envelope"></i>
                    </span>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Ingresa tu correo electrónico"
                        required
                        autocomplete="email"
                    >

                </div>

                @error('email')

                    <span class="error-message">
                        {{ $message }}
                    </span>

                @enderror

            </div>

            <div class="form-group">

                <label for="password">
                    Contraseña
                </label>

                <div class="input-wrapper">

                    <span class="input-icon">
                        <i class="bi bi-lock"></i>
                    </span>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Ingresa tu contraseña"
                        required
                        autocomplete="current-password"
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        onclick="togglePassword()"
                    >
                        <i class="bi bi-eye"></i>
                    </button>

                </div>

                @error('password')

                    <span class="error-message">
                        {{ $message }}
                    </span>

                @enderror

            </div>

            <div class="remember-container">

                <label class="remember-label">

                    <input
                        type="checkbox"
                        name="remember"
                        value="1"
                    >

                    <span>
                        Recordarme
                    </span>

                </label>

            </div>

            <button
                type="submit"
                class="login-button"
            >

                <span>→</span>

                Iniciar sesión

            </button>

        </form>

        <div class="register-section">

            <p>
                ¿No tienes una cuenta?
            </p>

            <a href="{{ route('register') }}">
                ✚ Regístrate aquí
            </a>

        </div>

    </div>

</div>


<script>

function togglePassword() {

    const password =
        document.getElementById('password');

    const button =
        document.querySelector('.password-toggle');


    if (password.type === 'password') {

        password.type = 'text';

        button.textContent = 'mostrar clave';

    } else {

        password.type = 'password';

        button.textContent = 'bi-eye';

    }

}

</script>

@endsection
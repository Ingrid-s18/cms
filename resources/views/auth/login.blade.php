@extends('layouts.app')

@section('title', 'Portal Seguro')

@section('content')

<div class="login-page">

    <div class="login-card">

        <!-- Icono -->

        <div class="login-icon">
            🔒
        </div>


        <!-- Encabezado -->

        <h1>Portal Seguro</h1>

        <p class="login-subtitle">
            Inicia sesión para continuar a tu cuenta
        </p>


        <!-- Formulario -->

        <form method="POST" action="{{ route('login.store') }}">

            @csrf


            <!-- Correo -->

            <div class="form-group">

                <label for="email">
                    Correo electrónico
                </label>

                <div class="input-wrapper">

                    <span class="input-icon">
                        ✉
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


            <!-- Contraseña -->

            <div class="form-group">

                <label for="password">
                    Contraseña
                </label>

                <div class="input-wrapper">

                    <span class="input-icon">
                        🔒
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
                        👁
                    </button>

                </div>


                @error('password')

                    <span class="error-message">
                        {{ $message }}
                    </span>

                @enderror

            </div>


            <!-- Recordarme -->

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


            <!-- Botón -->

            <button
                type="submit"
                class="login-button"
            >

                <span>→</span>

                Iniciar sesión

            </button>

        </form>


        <!-- Registro -->

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

        button.textContent = '🙈';

    } else {

        password.type = 'password';

        button.textContent = '👁';

    }

}

</script>

@endsection
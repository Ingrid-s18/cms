@extends('layouts.app')

@section('title', 'Contacto')

@section('content')

<div class="contact-page">

    <div class="contact-card">

        {{-- ICONO --}}
        <div class="contact-icon">
            ✉️
        </div>

        {{-- TITULO --}}
        <h1>Contáctanos</h1>

        {{-- SUBTITULO --}}
        <p class="contact-subtitle">
            Si tienes alguna pregunta o necesitas ayuda, puedes consultarlo aquí.
            
            Este es el portal de información que usan los guerreros y piratas, con gusto te ayudaremos.
            
            Estaremos encantados de atenderte.
        </p>

        {{-- LINEA --}}
        <div class="contact-divider"></div>

        {{-- FORMULARIO --}}
        <form class="contact-form">

            {{-- NOMBRE --}}
            <div class="contact-form-group">

                <label for="name">
                    Nombre
                </label>

                <div class="contact-input-wrapper">

                    <span class="contact-input-icon">
                        👤
                    </span>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Ingresa tu nombre"
                    >

                </div>

            </div>


            {{-- CORREO --}}
            <div class="contact-form-group">

                <label for="email">
                    Correo electrónico
                </label>

                <div class="contact-input-wrapper">

                    <span class="contact-input-icon">
                        ✉
                    </span>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Ingresa tu correo electrónico"
                    >

                </div>

            </div>


            {{-- MENSAJE --}}
            <div class="contact-form-group">

                <label for="message">
                    Mensaje
                </label>

                <div class="contact-input-wrapper textarea-wrapper">

                    <span class="contact-input-icon textarea-icon">
                        💬
                    </span>

                    <textarea
                        id="message"
                        name="message"
                        placeholder="Escribe tu mensaje..."
                        rows="6"
                    ></textarea>

                </div>

            </div>


            {{-- BOTON --}}
            <button type="submit" class="contact-button">
                <span>✈</span>
                Enviar mensaje
            </button>

        </form>

    </div>

</div>

@endsection
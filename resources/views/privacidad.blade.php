@extends('layout.plantilla')

@section('nombre_pagina')
    Politica de Privacidad -
@endsection

@section('contenido')
    @php
        $sectionClass = 'bg-gray-100';
    @endphp
    <div class="container mx-auto lg:px-20">
        <div class="px-4 lg:px-20 py-10 bg-white rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold mb-6 text-center">Política de Privacidad</h1>
            
            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Introducción</h2>
                <p class="text-lg text-gray-700">En Smart Manager, nos tomamos muy en serio su privacidad. Esta Política de Privacidad describe cómo recopilamos, usamos, y compartimos su información personal cuando utiliza nuestros servicios.</p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Información que Recopilamos</h2>
                <ul class="list-disc list-inside text-lg text-gray-700">
                    <li>Información de contacto, como nombre, dirección de correo electrónico, y número de teléfono.</li>
                    <li>Información sobre el uso del servicio, como interacciones y preferencias dentro de la plataforma.</li>
                    <li>Información técnica, como dirección IP, tipo de navegador, y datos de cookies.</li>
                </ul>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Cómo Usamos su Información</h2>
                <p class="text-lg text-gray-700">Utilizamos su información personal para proporcionar y mejorar nuestros servicios, comunicarnos con usted, y personalizar su experiencia en la plataforma. También podemos usar su información para fines de seguridad y cumplimiento legal.</p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Compartir Información con Terceros</h2>
                <p class="text-lg text-gray-700">No compartimos su información personal con terceros, excepto en los casos necesarios para proporcionar nuestros servicios, cumplir con la ley, o proteger nuestros derechos.</p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Sus Derechos</h2>
                <p class="text-lg text-gray-700">Tiene derecho a acceder, corregir, o eliminar su información personal. También puede optar por no recibir comunicaciones de marketing de nuestra parte en cualquier momento.</p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Cambios en esta Política</h2>
                <p class="text-lg text-gray-700">Podemos actualizar esta Política de Privacidad de vez en cuando. Le notificaremos sobre cualquier cambio importante a través de nuestro sitio web o por correo electrónico.</p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Contacto</h2>
                <p class="text-lg text-gray-700">Si tiene alguna pregunta o inquietud sobre esta Política de Privacidad, no dude en contactarnos a través de nuestro correo electrónico: <a href="mailto:soporte@smartmanager.com" class="text-blue-600 hover:underline">soporte@smartmanager.com</a>.</p>
            </section>
        </div>
    </div>
@endsection
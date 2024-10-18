@extends('layout.plantilla')

@section('nombre_pagina')
    Nosotros -
@endsection

@section('contenido')
    @php
        $sectionClass = 'bg-gray-100';
    @endphp
    <div class="container mx-auto lg:px-20">
        <div class="px-4 lg:px-20 py-10 bg-white rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold mb-6 text-center">Sobre Nosotros</h1>
            
            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">¿Qué es Smart Manager?</h2>
                <p class="text-lg text-gray-700">
                    Smart Manager es un recurso integral diseñado para gerentes que buscan mejorar su conocimiento y habilidades en diversas áreas de gestión. Nuestra plataforma ofrece acceso a una amplia gama de información, desde estrategias empresariales hasta noticias financieras actuales.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Nuestra Misión</h2>
                <p class="text-lg text-gray-700">
                    Nuestro objetivo es empoderar a los gerentes con herramientas y conocimientos actualizados para que puedan tomar decisiones informadas. En Smart Manager, proporcionamos contenido sobre Estrategias, Cuadro de Mando Integral, RSE, Gestión de Riesgos, CRM, y Gestión del Rendimiento.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Lo que Ofrecemos</h2>
                <p class="text-lg text-gray-700">
                    En Smart Manager, encontrará:
                </p>
                <ul class="list-disc list-inside text-lg text-gray-700">
                    <li>Consejos prácticos y ejemplos sobre Estrategias empresariales.</li>
                    <li>Guías y teorías sobre el Cuadro de Mando Integral.</li>
                    <li>Información y ejemplos sobre Responsabilidad Social Empresarial (RSE).</li>
                    <li>Herramientas y tips para la Gestión de Riesgos.</li>
                    <li>Recursos sobre CRM y cómo mejorar la relación con los clientes.</li>
                    <li>Consejos para una Gestión del Rendimiento efectiva.</li>
                    <li>Noticias y actualizaciones sobre el mundo financiero, incluyendo criptomonedas y tendencias actuales.</li>
                </ul>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Nuestro Compromiso</h2>
                <p class="text-lg text-gray-700">
                    Nos comprometemos a ofrecer contenido de alta calidad que sea relevante y útil para los gerentes en su día a día. Queremos ser su aliado confiable en el camino hacia el éxito gerencial.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Contáctenos</h2>
                <p class="text-lg text-gray-700">
                    Si desea obtener más información sobre Smart Manager o tiene alguna consulta, no dude en ponerse en contacto con nosotros a través de nuestro correo electrónico: <a href="mailto:soporte@smartmanager.com" class="text-blue-600 hover:underline">soporte@smartmanager.com</a>.
                </p>
            </section>
        </div>
    </div>
@endsection

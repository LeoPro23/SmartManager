@extends('layout.plantilla')

@section('nombre_pagina')
    {{ $articulo->titulo }} -
@endsection

@section('contenido')
    
    <div class="mb-8">Tema: {{ $articulo->tipo_contenido }}</div>

    <div class="container mx-auto px-4">

        <!-- Article Title -->
        <div class="text-4xl font-bold mb-8 text-center">{{ $articulo->titulo }}</div>

        <!-- Article Content -->
        <div class="prose max-w-none mb-8">
            {!! $articulo->contenido !!}
        </div>

        <!-- Advertisement at the bottom -->
        <div class="mt-8">
            <!-- Ad Slot -->
            <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                <!-- Example ad content, replace with actual ad code -->
                <div class="text-center">
                    <span class="text-sm text-gray-500">Anuncio Publicitario</span>
                </div>
            </div>
        </div>

        <!-- Back to Articles List -->
        <a href="{{ route('articulos.index') }}" class="text-blue-600 hover:underline mt-8 block text-center">Volver a la lista de artículos</a>

        <!-- Related Articles Section -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-4 text-center">Artículos Relacionados</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach($articulosRelacionados as $relacionado)
                    <div class="border p-4 rounded-lg shadow-md">
                        
                        @if($relacionado->primera_imagen)
                            <img src="{{ $relacionado->primera_imagen }}" alt="Imagen relacionada" class="w-full h-32 object-cover rounded-md mb-2">
                        @endif
                        <h3 class="text-xl font-semibold mb-2">
                            <a href="{{ route('articulos.show', $relacionado->id) }}" class="text-blue-600 hover:underline">
                                {{ $relacionado->titulo }}
                            </a>
                        </h3>
                        <p class="text-sm text-gray-600">
                            {{ Str::limit(strip_tags($relacionado->contenido), 100) }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

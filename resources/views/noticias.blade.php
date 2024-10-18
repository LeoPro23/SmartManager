@extends('layout.plantilla')

@section('contenido')
    <div class="container mx-auto px-4">
        <h1 class="text-4xl text-center font-bold mb-8">Noticias</h1>
        
        @if($articulos->isEmpty())
            <p class="text-gray-600">No hay noticias disponibles en este momento.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach($articulos as $articulo)
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        @if($articulo->primera_imagen)
                            <img src="{{ $articulo->primera_imagen }}" alt="Imagen del artículo" class="w-full h-48 object-cover mb-4">
                        @endif
                        <h3 class="text-xl font-bold mb-2">{{ $articulo->titulo }}</h3>
                        <p>{{ Str::limit(strip_tags($articulo->contenido), 100) }}</p>
                        <a href="{{ route('articulos.show', $articulo->id) }}" class="text-blue-600 hover:underline">Leer más</a>
                    </div>
                @endforeach
            </div>
        @endif
        
        <!-- Noticias sobre Contabilidad -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-4">Noticias sobre Contabilidad</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($noticiasContabilidad as $noticia)
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <img src="{{ $noticia['urlToImage'] }}" alt="Imagen de la noticia" class="w-full h-48 object-cover mb-4">
                        <h3 class="text-xl font-bold mb-2">{{ $noticia['title'] }}</h3>
                        <p>{{ Str::limit(strip_tags($noticia['description']), 100) }}</p>
                        <a href="{{ $noticia['url'] }}" target="_blank" class="text-blue-600 hover:underline">Leer más</a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Noticias de Empresas Importantes -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-4">Noticias de Empresas Importantes</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($noticiasEmpresas as $noticia)
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <img src="{{ $noticia['urlToImage'] }}" alt="Imagen de la noticia" class="w-full h-48 object-cover mb-4">
                        <h3 class="text-xl font-bold mb-2">{{ $noticia['title'] }}</h3>
                        <p>{{ Str::limit(strip_tags($noticia['description']), 100) }}</p>
                        <a href="{{ $noticia['url'] }}" target="_blank" class="text-blue-600 hover:underline">Leer más</a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Noticias sobre Finanzas Corporativas -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-4">Noticias sobre Finanzas Corporativas</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($noticiasFinanzas as $noticia)
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <img src="{{ $noticia['urlToImage'] }}" alt="Imagen de la noticia" class="w-full h-48 object-cover mb-4">
                        <h3 class="text-xl font-bold mb-2">{{ $noticia['title'] }}</h3>
                        <p>{{ Str::limit(strip_tags($noticia['description']), 100) }}</p>
                        <a href="{{ $noticia['url'] }}" target="_blank" class="text-blue-600 hover:underline">Leer más</a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Información de Acciones -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-4">Información de Acciones</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($acciones as $accion)
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold mb-2">{{ $accion['symbol'] }}</h3>
                        <p>Precio: ${{ number_format($accion['price'], 2) }}</p>
                        <p>Volumen: {{ number_format($accion['volume']) }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Información de Criptomonedas -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-4">Información de Criptomonedas</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($criptomonedas as $crypto)
                    <div class="p-6 bg-white rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold mb-2">{{ $crypto['symbol'] }}</h3>
                        <p>Precio: ${{ number_format($crypto['price'], 2) }}</p>
                        <p>Cambio 24h: {{ number_format($crypto['change_24h'], 2) }}%</p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection

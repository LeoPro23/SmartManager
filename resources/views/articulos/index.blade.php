@extends('layout.plantilla')

@section('contenido')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-8">Artículos</h1>

        <!-- Filtro por tipo de contenido y búsqueda por título -->
        <div class="mb-6">
            <form action="{{ route('articulos.index') }}" method="GET" class="max-w-lg mx-auto mb-5">
                <div class="flex">
                    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only">Buscar Artículo</label>

                    <!-- Botón desplegable de categorías -->
                    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100" type="button">
                        {{ request('tipo_contenido') ? ucfirst(request('tipo_contenido')) : 'Todas las categorias' }}
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>

                    <!-- Dropdown de categorías -->
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdown-button">
                            <li><button type="button" onclick="selectCategory('')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Todas</button></li>
                            <li><button type="button" onclick="selectCategory('estrategias')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Estrategias</button></li>
                            <li><button type="button" onclick="selectCategory('cuadro_de_mando_integral')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Cuadro de Mando Integral</button></li>
                            <li><button type="button" onclick="selectCategory('rse')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">RSE</button></li>
                            <li><button type="button" onclick="selectCategory('riesgos')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Riesgos</button></li>
                            <li><button type="button" onclick="selectCategory('crm')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">CRM</button></li>
                            <li><button type="button" onclick="selectCategory('gestion_del_rendimiento')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Gestión del Rendimiento</button></li>
                            <li><button type="button" onclick="selectCategory('contabilidad')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Contabilidad</button></li>
                            <li><button type="button" onclick="selectCategory('noticias')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Noticias</button></li>
                        </ul>
                    </div>

                    <!-- Campo de búsqueda -->
                    <div class="relative w-full">
                        <input type="hidden" name="tipo_contenido" id="selected-category" value="{{ request('tipo_contenido') }}">
                        <input type="search" id="search-dropdown" name="query" value="{{ request('query') }}" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Buscar por nombre de articulo..."/>
                        <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Lista de artículos -->
        @if($articulos->isEmpty())
            <p class="text-gray-500">No se encontraron artículos.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
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
            
            <!-- Paginación -->
            <div class="mt-8">
                {{ $articulos->links() }}
            </div>

        @endif
    </div>

    <!-- JavaScript para seleccionar categoría -->
    <script>
        function selectCategory(category) {
            document.getElementById('selected-category').value = category;
            document.getElementById('dropdown-button').innerText = category ? capitalizeFirstLetter(category.replace(/_/g, ' ')) : 'Todas las categorias';
        }

        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
    </script>
@endsection

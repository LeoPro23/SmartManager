@extends('layout.plantilla')

@section('contenido')
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-8">Bienvenido a Smart Manager</h1>

        <!-- Categorías -->
        <div>
            <!-- Carrusel de Categorías -->
            <div class="relative overflow-hidden w-full mb-12 left-3">
                <div id="carousel-track" class="flex transition-transform ease-in-out duration-700">
                    
                    <div class="carousel-item flex-none w-full md:w-1/3 px-2" id="card1">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg">
                            <img src="{{ asset('imagenes/estrategias.png') }}" alt="Estrategias" class="w-full h-40 object-cover mb-4">
                            <div class="px-6">
                                <div class="font-bold text-xl mb-2">Estrategias</div>
                                <p class="text-gray-700 text-base">Descubre tips y teorías sobre estrategias empresariales.</p>
                            </div>
                            <div class="pt-4 pb-2">
                                <a href="{{ route('articulos.index', ['tipo_contenido' => 'estrategias']) }}" class="px-6 text-blue-600 hover:underline">Ver artículos</a>
                            </div>
                        </div>
                    </div>
        
                    <div class="carousel-item flex-none w-full md:w-1/3 px-2" id="card2">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg">
                            <img src="{{ asset('imagenes/contabilidad.png') }}" alt="Contabilidad para gerentes" class="w-full h-40 object-cover mb-4">
                            <div class="px-6">
                                <div class="font-bold text-xl mb-2">Contabilidad para Gerentes</div>
                                <p class="text-gray-700 text-base">Encuentra artículos sobre contabilidad especialmente para gerentes.</p>
                            </div>
                            <div class="pt-4 pb-2">
                                <a href="{{ route('articulos.index', ['tipo_contenido' => 'contabilidad']) }}" class="px-6 text-blue-600 hover:underline">Ver artículos</a>
                            </div>
                        </div>
                    </div>
        
                    <div class="carousel-item flex-none w-full md:w-1/3 px-2" id="card3">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg">
                            <img src="{{ asset('imagenes/noticias.png') }}" alt="Noticias" class="w-full h-40 object-cover mb-4">
                            <div class="px-6">
                                <div class="font-bold text-xl mb-2">Noticias</div>
                                <p class="text-gray-700 text-base">Mantente al día con las últimas noticias en el ámbito empresarial.</p>
                            </div>
                            <div class="pt-4 pb-2">
                                <a href="{{ route('articulos.index', ['tipo_contenido' => 'noticias']) }}" class="px-6 text-blue-600 hover:underline">Ver artículos</a>
                            </div>
                        </div>
                    </div>
        
                    <div class="carousel-item flex-none w-full md:w-1/3 px-2" id="card4">
                        <div class="max-w-sm rounded overflow-hidden shadow-lg">
                            <img src="{{ asset('imagenes/gestion.jpg') }}" alt="Gestion del Rendimiento" class="w-full h-40 object-cover mb-4">
                            <div class="px-6">
                                <div class="font-bold text-xl mb-2">Gestión del Rendimiento</div>
                                <p class="text-gray-700 text-base">Optimiza y evalúa el rendimiento de tu equipo con estos artículos.</p>
                            </div>
                            <div class="pt-4 pb-2">
                                <a href="{{ route('articulos.index', ['tipo_contenido' => 'gestion_del_rendimiento']) }}" class="px-6 text-blue-600 hover:underline">Ver artículos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Controles de Navegación -->
            
            <button class="absolute left-4 top-1/2 transform bg-gray-500 bg-opacity-50 text-white rounded-full p-2 hover:bg-opacity-70 focus:outline-none" onclick="prevSlide()">&#9664;</button>
            
            <button class="absolute right-3 top-1/2 transform bg-gray-500 bg-opacity-50 text-white rounded-full p-2 hover:bg-opacity-70 focus:outline-none" onclick="nextSlide()">&#9654;</button>
        
        </div>

        <!-- Artículos destacados -->
        <h2 class="text-3xl font-bold mb-6">Artículos Destacados</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach($articulosDestacados as $articulo)
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

        <!-- Videos destacados -->
        <h2 class="text-3xl font-bold mb-6">Videos Destacados</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="relative p-4 bg-white rounded-lg shadow-lg" onclick="openModal('modalVideo1')">
                <img src="https://img.youtube.com/vi/RRhWzuhHWLg/hqdefault.jpg" alt="Video Thumbnail" class="cursor-pointer">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/YouTube_full-color_icon_%282017%29.svg/512px-YouTube_full-color_icon_%282017%29.svg.png" alt="YouTube Icon" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-15 h-12">
            </div>
            <div class="relative p-4 bg-white rounded-lg shadow-lg" onclick="openModal('modalVideo2')">
                <img src="https://img.youtube.com/vi/nSAYRKpYIeg/hqdefault.jpg" alt="Video Thumbnail" class="cursor-pointer">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/YouTube_full-color_icon_%282017%29.svg/512px-YouTube_full-color_icon_%282017%29.svg.png" alt="YouTube Icon" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-15 h-12">
            </div>
            <div class="relative p-4 bg-white rounded-lg shadow-lg" onclick="openModal('modalVideo3')">
                <img src="https://img.youtube.com/vi/Ztr24-JBL2s/hqdefault.jpg" alt="Video Thumbnail" class="cursor-pointer">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/YouTube_full-color_icon_%282017%29.svg/512px-YouTube_full-color_icon_%282017%29.svg.png" alt="YouTube Icon" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-15 h-12">
            </div>                       
        </div>

        <!-- Modales para los videos -->
        <div id="modalVideo1" class="fixed inset-0 bg-black bg-opacity-75 hidden justify-center items-center z-50">
            <div class="bg-white p-4 lg:p-8 rounded-lg max-w-6xl w-full mx-auto">
                <button class="text-right mb-4" onclick="closeModal('modalVideo1')">✕</button>
                <iframe src="https://www.youtube.com/embed/RRhWzuhHWLg" 
                        title="YouTube video player" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen class="w-full h-[350px] lg:h-[450px]">
                </iframe>
            </div>
        </div>


        <div id="modalVideo2" class="fixed inset-0 bg-black bg-opacity-75 hidden justify-center items-center z-50">
            <div class="bg-white p-4 lg:p-8 rounded-lg max-w-6xl w-full mx-auto">
                <button class="text-right mb-4" onclick="closeModal('modalVideo2')">✕</button>
                <div class="aspect-w-16 aspect-h-9">
                    <iframe src="https://www.youtube.com/embed/nSAYRKpYIeg" 
                            title="YouTube video player" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen class="w-full h-[350px] lg:h-[450px]">
                    </iframe>
                </div>
            </div>
        </div>

        <div id="modalVideo3" class="fixed inset-0 bg-black bg-opacity-75 hidden justify-center items-center z-50">
            <div class="bg-white p-4 lg:p-8 rounded-lg max-w-6xl w-full mx-auto">
                <button class="text-right mb-4" onclick="closeModal('modalVideo3')">✕</button>
                <div class="aspect-w-16 aspect-h-9">
                    <iframe src="https://www.youtube.com/embed/Ztr24-JBL2s" 
                            title="YouTube video player" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen class="w-full h-[350px] lg:h-[450px]">
                    </iframe>
                </div>
            </div>
        </div>
    </div>

    <script>
        let index = 0;
        const track = document.getElementById('carousel-track');
        const items = document.querySelectorAll('.carousel-item');
        let itemsPerView = window.innerWidth < 768 ? 1 : 3; // 1 item for screens smaller than 768px, 3 for larger screens
        let itemWidth = 100 / itemsPerView;
    
        // Adjust the track with cloned items
        const firstItems = Array.from(items).slice(0, itemsPerView);
        const lastItems = Array.from(items).slice(-itemsPerView);
    
        lastItems.reverse().forEach(item => track.insertBefore(item.cloneNode(true), track.firstChild));
        firstItems.forEach(item => track.appendChild(item.cloneNode(true)));
    
        index = itemsPerView;
        track.style.transform = `translateX(-${index * itemWidth}%)`;
    
        function updateSlide(position) {
            track.style.transition = 'transform 0.7s ease-in-out';
            track.style.transform = `translateX(-${position * itemWidth}%)`;
        }
    
        function nextSlide() {
            index++;
            updateSlide(index);
    
            if (index >= items.length + itemsPerView) {
                setTimeout(() => {
                    track.style.transition = 'none';
                    index = itemsPerView;
                    track.style.transform = `translateX(-${index * itemWidth}%)`;
                }, 700);
            }
        }
    
        function prevSlide() {
            index--;
            updateSlide(index);
    
            if (index < 0) {
                setTimeout(() => {
                    track.style.transition = 'none';
                    index = items.length;
                    track.style.transform = `translateX(-${index * itemWidth}%)`;
                }, 700);
            }
        }
    
        // Recalculate itemsPerView and itemWidth on window resize
        window.addEventListener('resize', () => {
            itemsPerView = window.innerWidth < 768 ? 1 : 3;
            itemWidth = 100 / itemsPerView;
            index = itemsPerView;
            track.style.transform = `translateX(-${index * itemWidth}%)`;
        });
    
        setInterval(nextSlide, 5000);
    
    </script>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
            document.getElementById(modalId).classList.add('flex');
        }
    
        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('flex');
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>

@endsection

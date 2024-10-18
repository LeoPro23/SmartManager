<!DOCTYPE html>
<html class="scroll-smooth scroll-p-20" lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('nombre_pagina')
        Smart Manager
    </title>

    <!-- CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- ICONOS / FUENTES-->

    <link rel="icon" href="{{ asset('imagenes/SmartManagericon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
    
    <!-- JS / LIBRERÍAS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="{{ asset('js/cards.js') }}"></script>
    <script src="{{ asset('js/multilenguaje.js') }}"></script>
    <script src="{{ asset('js/carrousel.js') }}"></script>
    <script src="{{ asset('js/modooscuro.js') }}"></script>
    
</head>
<body style="font-family: 'Poppins', sans-serif;">

    <!--bg-gradient-to-l from-blue-600 to-blue-300-->
    <nav id="header" class="fixed top-0 left-0 right-0 z-50 bg-gray-200">
        <div class="container mx-auto flex flex-wrap items-center justify-between p-4">

            <div>
                <a href="#"><img id="logo-header" class="h-14 md:h-16 lg:h-20" src="{{ asset('imagenes/SmartManagerLogo.png') }}" alt="LOGO"></a>
            </div>

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">                                                               <!--text-black y -->
                <ul id="navitems" class="flex flex-col font-semibold p-4 bg-gray-900 rounded-lg md:items-center md:bg-transparent md:p-0 mt-4 md:flex-row md:space-x-8 md:mt-0 md:border-0 lg:text-black text-white hover:text-black md:hover:text-black">
                    <li>
                        <a href="{{ route('inicio')}}" id="n1" class="block py-2 pl-3 pr-4 rounded-lg hover:bg-black md:hover:bg-transparent md:rounded-none md:hover:border-b-2 md:border-black md:p-0">Inicio</a>
                    </li>
                    <li>
                        <a href="{{ route('articulos.index')}}" id="n2" class="block py-2 pl-3 pr-4 rounded-lg hover:bg-black md:hover:bg-transparent md:rounded-none md:hover:border-b-2 md:border-black md:p-0">Articulos</a>
                    </li>
                    <li>
                        <a href="{{ route('noticias')}}" id="n3" class="block py-2 pl-3 pr-4 rounded-lg hover:bg-black md:hover:bg-transparent md:rounded-none md:hover:border-b-2 md:border-black md:p-0">Noticias</a>
                    </li>
                    <li>
                        <a href="{{ route('nosotros')}}" id="n4" class="block py-2 pl-3 pr-4 rounded-lg hover:bg-black md:hover:bg-transparent md:rounded-none md:hover:border-b-2 md:border-black md:p-0">Nosotros</a>
                    </li>
                    <li>
                        <a href="{{ route('privacidad')}}" id="n5" class="block py-2 pl-3 pr-4 rounded-lg hover:bg-black md:hover:bg-transparent md:rounded-none md:hover:border-b-2 md:border-black md:p-0">Privacidad</a>
                    </li>
                    <li>
                        <a href="{{ route('ratios.form')}}" id="n5" class="block py-2 pl-3 pr-4 rounded-lg hover:bg-black md:hover:bg-transparent md:rounded-none md:hover:border-b-2 md:border-black md:p-0">Calcular Ratios</a>
                    </li> 
                    <li>
                        <a href="{{ route('calculadorformula') }}" id="calculadora" class="block py-2 pl-3 pr-4 rounded-lg hover:bg-black md:hover:bg-transparent md:rounded-none md:hover:border-b-2 md:border-black md:p-0">Calculadora Financiera</a>
                    </li>                    
                </ul>      
            </div>


            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 md:order-3">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

        </div>
    </nav>

    
    <section id="contenido" class="py-40 transition-colors duration-500 p-10 {{ $sectionClass ?? 'bg-white' }}">
        @yield('contenido')
    </section>

    <footer id="footer" class="grid grid-cols-2 lg:grid-cols-3 lg:px-20 pt-10 bg-gradient-to-l from-blue-700 via-blue-200 to-blue-700 gap-7 text-white">
        <div class="flex flex-col md:items-center text-center" style="font-family: 'Russo One', cursive;">
            <a href="#" class="font" id="f1">Recursos</a>
            <a href="#" class="font"><br></a>
            <a href="#" class="font" id="f2">Inicio</a>
            <a href="#" class="font" id="f3">Noticias</a>
            <a href="#" class="font" id="f4">Curiosidades</a>
            <a href="#" class="font" id="f5">Articulos</a>
            <a href="#" class="font" id="f6">Nosotros</a>
        </div>
        <div class="hidden lg:flex justify-center items-center" style="font-family: 'Russo One', cursive;">
            <p class="text-blue-700 hover:text-blue-900 text-xl transition-colors duration-500 cursor-pointer">SMART MANAGER</p>
        </div>
        <div class="flex flex-col justify-center text-center">
            <a href="#"><i class="fa-brands fa-facebook fa-xl " style="color: white;"></i></a> 
            <a href="#"><i class="fa-brands fa-instagram fa-xl" style="color: white;"></i></a>
            <a href="#"><i class="fa-brands fa-twitter fa-xl" style="color: white;"></i></a>
            <a href="#"><i class="fa-brands fa-youtube fa-xl" style="color: white;"></i></a>
        </div>
        <div class="hidden lg:flex col-span-3 m-4 justify-center gap-10">
            <a href="#" class="font text-black" id="f7">Politica de Privacidad</a>
            <a href="#" class="font text-black" id="f8">Términos y Condiciones</a>
            <a href="#" class="font text-black" id="f10">Contacto</a>
        </div>
    </footer>
      
</body>
</html>

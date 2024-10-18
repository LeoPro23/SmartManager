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
                        <a href="{{ route('privacidad')}}" id="n5" class="block py-2 pl-3 pr-4 rounded-lg hover:bg-black md:hover:bg-transparent md:rounded-none md:hover:border-b-2 md:border-black md:p-0">Calcular</a>
                    </li>
                </ul>      
            </div>

            <!--Boton modo oscuro-->
            <div id="toggleButtonModoOscuro" onclick="toggleDarkMode()" class="pointer-events-auto h-6 w-10 rounded-full p-1 ring-1 ring-inset transition duration-200 ease-in-out bg-black ring-black md:order-2">
                <div id="bolitaBotonModoOscuro" class="h-4 w-4 rounded-full bg-white shadow-sm ring-1 ring-slate-700/10 transition duration-200 ease-in-out">
                </div>
            </div>

            <!--Display idiomas-->
            <div class="flex items-center md:order-3">
                <button id="botonidioma" type="button" data-dropdown-toggle="language-dropdown-menu" class="flex items-center font-medium justify-center px-4 py-2 rounded-lg cursor-pointer text-black"> 
                    <img src="{{ asset('imagenes/flecha.png') }}" alt="">
                    <span id="current-language">Español</span>
                </button>
                <!-- Dropdown -->
                <div class="z-50 hidden my-4 text-base list-none bg-gray-600 divide-y divide-gray-100 rounded-lg shadow" id="language-dropdown-menu">
                  <ul class="py-2 font-medium" role="none">
                    <li>
                      <a href="#" onclick="changeLanguage('Español')" data-language="es" class="block px-4 py-2 text-sm text-white hover:bg-gray-100 hover:text-black" role="menuitem">
                        <div class="inline-flex items-center">
                            <svg class="h-3.5 w-3.5 rounded-full mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" id="flag-icon-español" viewBox="0 0 512 512"><path fill="#b81414" d="M0 341.3h512V512H0z"/><path fill="#b81414" d="M0 0h512v170.7H0z"/><path fill="#f7d547" d="M0 170.7h512v170.6H0z"/></svg>
                            Español
                        </div>
                      </a>
                    </li>
                    <li>
                        <a href="#" onclick="changeLanguage('English')" data-language="en" class="block px-4 py-2 text-sm text-white hover:bg-gray-100 hover:text-black" role="menuitem">
                            <div class="inline-flex items-center">
                              <svg aria-hidden="true" class="h-3.5 w-3.5 rounded-full mr-2" xmlns="http://www.w3.org/2000/svg" id="flag-icon-english" viewBox="0 0 512 512"><g fill-rule="evenodd"><g stroke-width="1pt"><path fill="#bd3d44" d="M0 0h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z" transform="scale(3.9385)"/><path fill="#fff" d="M0 10h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0zm0 20h247v10H0z" transform="scale(3.9385)"/></g><path fill="#192f5d" d="M0 0h98.8v70H0z" transform="scale(3.9385)"/><path fill="#fff" d="M8.2 3l1 2.8H12L9.7 7.5l.9 2.7-2.4-1.7L6 10.2l.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7L74 8.5l-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 7.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 24.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 21.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 38.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 35.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 52.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 49.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm-74.1 7l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7H65zm16.4 0l1 2.8H86l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm-74 7l.8 2.8h3l-2.4 1.7.9 2.7-2.4-1.7L6 66.2l.9-2.7-2.4-1.7h3zm16.4 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8H45l-2.4 1.7 1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9zm16.4 0l1 2.8h2.8l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h3zm16.5 0l.9 2.8h2.9l-2.3 1.7.9 2.7-2.4-1.7-2.3 1.7.9-2.7-2.4-1.7h2.9zm16.5 0l.9 2.8h2.9L92 63.5l1 2.7-2.4-1.7-2.4 1.7 1-2.7-2.4-1.7h2.9z" transform="scale(3.9385)"/></g></svg>              
                              English
                            </div>
                          </a>
                    </li>
                    <li>
                      <a href="#" onclick="changeLanguage('Portugues')" data-language="pt" class="block px-4 py-2 text-sm text-white hover:bg-gray-100 hover:text-black" role="menuitem">
                        <div class="inline-flex items-center">
                          <svg class="h-3.5 w-3.5 rounded-full mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" id="flag-icon-portugues" viewBox="0 0 512 512"><g fill-rule="evenodd" stroke-width="1pt"><path fill="#ce2b37" d="M0 0h512v512H0z"/><path fill="#009246" d="M0 0h170.7v512H0z"/><path fill="#ce2b37" d="M341.3 0H512v512H341.3z"/></g></svg>              
                          Portugues
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>

                <!--Boton Menu Hamburguesa-->
                <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden" aria-controls="navbar-cta" aria-expanded="false">
                    <span class="sr-only">Abrir menu</span>
                    <img src="{{ asset('imagenes/menuhamburguesa.svg') }}" alt="Hamburguesa">
                </button>
                
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

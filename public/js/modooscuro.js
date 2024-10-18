
//MOVER LA BOLITA Y CAMBIAR EL COLOR DEL BOTON AL HACER CLICK
document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.getElementById('toggleButtonModoOscuro');

    toggleButton.addEventListener('click', function () {
        // Cambiar las clases al dar clic
        //toggleButton.classList.toggle('bg-black', !toggleButton.classList.contains('bg-black'));
        //toggleButton.classList.toggle('bg-white', !toggleButton.classList.contains('bg-white'));
        //toggleButton.classList.toggle('ring-black', !toggleButton.classList.contains('ring-black'));
        //toggleButton.classList.toggle('ring-white', !toggleButton.classList.contains('ring-white'));
        toggleButton.classList.toggle('bg-black');
        toggleButton.classList.toggle('bg-white');
        toggleButton.classList.toggle('ring-black');
        toggleButton.classList.toggle('ring-white');

        // Mover el círculo blanco al dar clic
        const innerCircle = toggleButton.querySelector('.rounded-full');
        innerCircle.classList.toggle('translate-x-4', !innerCircle.classList.contains('translate-x-4'));
    });
});


//MODO OSCURO
var modoOscuro = 0;
function toggleDarkMode() {
    var logoheaderxd = document.getElementById('logo-header')
    var footerModoOsc = document.getElementById('footer');
    var inicioFondoGa = document.getElementById('inicio');

    //Items del navbar
    var navitems = document.getElementById('navitems');

    
    // Cambia el estado entre 0 y 1
    modoOscuro = 1 - modoOscuro;

    // Aplica clases según el estado
    if (modoOscuro === 1) {
        footerModoOsc.classList.remove('bg-gradient-to-l', 'from-blue-700', 'via-blue-200', 'to-blue-700');
        footerModoOsc.classList.add('bg-black');
        inicioFondoGa.style.backgroundImage = "url('recursos/fondo-negro.jpg')";
        // Cambia la imagen del logo en modo oscuro
        logoheaderxd.src = "recursos/logo-header-white.png";

        //Items del Navbar
        var itemsToChange = navitems.querySelectorAll('.md\\:border-black');
        // Itera sobre cada elemento y realiza el cambio de clase para modo oscuro
        itemsToChange.forEach(function(item) {
            item.classList.remove('md:border-black');
            item.classList.add('md:border-white');
        });

    } else {
        footerModoOsc.classList.remove('bg-black');
        footerModoOsc.classList.add('bg-gradient-to-l', 'from-blue-700', 'via-blue-200', 'to-blue-700');
        inicioFondoGa.style.backgroundImage = "url('recursos/fondo1.png')";
        // Restaura la imagen original del logo
        logoheaderxd.src = "recursos/logo-header.png";

        //Items del Navbar
        var itemsToChange = navitems.querySelectorAll('.md\\:border-white');
        // Itera sobre cada elemento y restaura la clase original
        itemsToChange.forEach(function(item) {
            item.classList.remove('md:border-white');
            item.classList.add('md:border-black');
        });
    }

    

    var headerBW = document.getElementById('header-ff');
    headerBW.classList.toggle('bg-gray-200');
    headerBW.classList.toggle('bg-black');
    
    navitems.classList.toggle('lg:text-black');
    navitems.classList.toggle('lg:text-white');
    navitems.classList.toggle('hover:text-black');
    navitems.classList.toggle('hover:text-white');
    navitems.classList.toggle('md:hover:text-black');
    navitems.classList.toggle('md:hover:text-white');
    
    var botonidioma=document.getElementById('botonidioma');
    botonidioma.classList.toggle('text-black');
    botonidioma.classList.toggle('text-white');


    var sloganGaa = document.getElementById('slogan');
    sloganGaa.classList.toggle('text-white');
    sloganGaa.classList.toggle('text-black');

    
    var bolitaOsc = document.getElementById('bolitaBotonModoOscuro');
    bolitaOsc.classList.toggle('bg-black');
    bolitaOsc.classList.toggle('bg-white');


    var llamapoleNombre = document.getElementById('llamapoleNombre');
    llamapoleNombre.classList.toggle('text-white');
    llamapoleNombre.classList.toggle('text-blue-700');
    llamapoleNombre.classList.toggle('hover:text-gray-300');
    llamapoleNombre.classList.toggle('hover:text-blue-900');

    var nosotrosDa = document.getElementById('nosotros');
    nosotrosDa.classList.toggle('bg-blue-200');
    nosotrosDa.classList.toggle('bg-gray-900');

    var preguntaGaa = document.getElementById('pregunta');
    preguntaGaa.classList.toggle('text-blue-700');
    preguntaGaa.classList.toggle('text-white');

    var t1gaa = document.getElementById('t1');
    t1gaa.classList.toggle('text-white');
    t1gaa.classList.toggle('text-black');

    var t2gaa = document.getElementById('t2');
    t2gaa.classList.toggle('text-white');
    t2gaa.classList.toggle('text-black');

    var bgNosotros = document.getElementById('bgNosotros');
    bgNosotros.classList.toggle('bg-blue-700');
    bgNosotros.classList.toggle('bg-black');
    
    var ftiGaaa = document.getElementById('fti');
    ftiGaaa.classList.toggle('text-blue-500');
    ftiGaaa.classList.toggle('text-white');
    
    var fteGaaa = document.getElementById('fte');
    fteGaaa.classList.toggle('text-black');
    fteGaaa.classList.toggle('text-white');

    var contactoGaa = document.getElementById('contacto');
    contactoGaa.classList.toggle('bg-gray-700');
    contactoGaa.classList.toggle('bg-white');
    
    var l1gris = document.getElementById('l1');
    l1gris.classList.toggle('text-white');
    l1gris.classList.toggle('text-gray-500');
    l1gris.classList.toggle('peer-focus:text-blue-600');
    l1gris.classList.toggle('peer-focus:text-white');
    
    var l2gris = document.getElementById('l2');
    l2gris.classList.toggle('text-white');
    l2gris.classList.toggle('text-gray-500');
    l2gris.classList.toggle('peer-focus:text-blue-600');
    l2gris.classList.toggle('peer-focus:text-white');

    var l3griss = document.getElementById('l3');
    l3griss.classList.toggle('text-white');
    l3griss.classList.toggle('text-gray-500');
    l3griss.classList.toggle('peer-focus:text-blue-600');
    l3griss.classList.toggle('peer-focus:text-white');
    
    var usuarioBlack = document.getElementById('usuario');
    usuarioBlack.classList.toggle('bg-gray-700');
    usuarioBlack.classList.toggle('bg-white');
    usuarioBlack.classList.toggle('focus:border-blue-600');
    usuarioBlack.classList.toggle('focus:border-white');

    var correoBlack = document.getElementById('correo');
    correoBlack.classList.toggle('bg-gray-700');
    correoBlack.classList.toggle('bg-white');
    correoBlack.classList.toggle('focus:border-blue-600');
    correoBlack.classList.toggle('focus:border-white');

    var telefonoBlack = document.getElementById('telefono');
    telefonoBlack.classList.toggle('bg-gray-700');
    telefonoBlack.classList.toggle('bg-white');
    telefonoBlack.classList.toggle('focus:border-blue-600');
    telefonoBlack.classList.toggle('focus:border-white');

    var InstagramDark = document.getElementById('InstagramDark');
    InstagramDark.classList.toggle('text-black');
    InstagramDark.classList.toggle('text-white');

    var divInstagramGaaaa = document.getElementById('divInstagramGaaaa');
    divInstagramGaaaa.classList.toggle('text-gray-500');
    divInstagramGaaaa.classList.toggle('text-white');

    var WhatsappDark = document.getElementById('WhatsAppDark');
    WhatsappDark.classList.toggle('text-black');
    WhatsappDark.classList.toggle('text-white');

    var divNumerosGaaaa = document.getElementById('divNumerosGaaaa');
    divNumerosGaaaa.classList.toggle('text-gray-500');
    divNumerosGaaaa.classList.toggle('text-white');
    
    var zapatillasub = document.getElementById('f7');
    zapatillasub.classList.toggle('text-black');
    zapatillasub.classList.toggle('text-white');

    var buzossub = document.getElementById('f8');
    buzossub.classList.toggle('text-black');
    buzossub.classList.toggle('text-white');

    var gorrossub = document.getElementById('f9');
    gorrossub.classList.toggle('text-black');
    gorrossub.classList.toggle('text-white');

    var polossub = document.getElementById('f10');
    polossub.classList.toggle('text-black');
    polossub.classList.toggle('text-white');
}

//modo oscuro
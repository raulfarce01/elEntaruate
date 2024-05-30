let hamburguesa = $('#hamburguesa');
let menuMobile = $('#menuMobile');
let mobileBack = $('#mobileBack');
let userHeader = $('#userHeader');
let desplegableUser = $('#desplegableUser');
let header = $('#header');
let logo = $('#logo');
let fondoImagen = $('#fondoImagen');
let logoImg = $('#logoImg');
let logoText = $('#logoText');

hamburguesa.on('click', function () {
    menuMobile.toggleClass('hidden');
});

mobileBack.on('click', function () {
    menuMobile.toggleClass('hidden');
});

userHeader.on('click', function () {
    desplegableUser.toggleClass('hidden');
});

$(window).scroll(function() {
    posicionarMenu();
});

function posicionarMenu() {
    if ($(window).scrollTop() > 500) {
        logo.removeClass('w-20');
        logo.addClass('w-10');
    } else {
        logo.removeClass('w-10');
        logo.addClass('w-20');
    }
}

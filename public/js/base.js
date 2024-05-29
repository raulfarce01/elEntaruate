let hamburguesa = $('#hamburguesa');
let menuMobile = $('#menuMobile');
let mobileBack = $('#mobileBack');
let userHeader = $('#userHeader');
let desplegableUser = $('#desplegableUser');

hamburguesa.on('click', function () {
    menuMobile.toggleClass('hidden');
});

mobileBack.on('click', function () {
    menuMobile.toggleClass('hidden');
});

userHeader.on('click', function () {
    desplegableUser.toggleClass('hidden');
})

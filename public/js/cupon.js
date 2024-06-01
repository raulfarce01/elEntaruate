let abreModalCupon = $('#abreModalCupon');
let cerrarModalCupon = $('#cerrarModalCupon');

abreModalCupon.on('click', function () {
    $('#modalCupon').removeClass('hidden');
    $('#modalCupon').addClass('flex');
});

cerrarModalCupon.on('click', function () {
    $('#modalCupon').removeClass('flex');
    $('#modalCupon').addClass('hidden');
})

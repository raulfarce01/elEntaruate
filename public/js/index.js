let closeModalReserva = $('#closeModalReserva');
let flechaIndex = $('#flechaIndex');

function abreModalReserva(idUser) {
    $("html, body").animate({
        scrollTop: 0
    }, 500);
    if(idUser < 1){
        window.location.href = '/login';
    }
    if($('#modalReserva').hasClass('hidden')){
        $('#modalReserva').removeClass('hidden');
        $('#modalReserva').addClass('flex');
    }else{
        $('#modalReserva').removeClass('flex');
        $('#modalReserva').addClass('hidden');
    }
}

closeModalReserva.on('click', function () {
    $('#modalReserva').removeClass('flex');
    $('#modalReserva').addClass('hidden');
});

flechaIndex.on('click', function () {
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#familia").offset().top
    }, 500);
});

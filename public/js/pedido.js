let listaPlatosPedido = $('#listaPlatosPedido');

function añadePlatoPedido(idPlato){

    let addPlatoPedido = $('#addPlatoPedido'+idPlato);
    addPlatoPedido.toggleClass('hidden');

    let containerContador = $('#containerContador'+idPlato);
    containerContador.toggleClass('hidden');

    let cantidadPlato = $('#cantidadPlato'+idPlato);
    let sumaContador = $('#sumaContador'+idPlato);
    let restaContador = $('#restaContador'+idPlato);

    listaPlatosPedido.append(`<input id="platoPedidoLista${idPlato}" type="hidden" name="platos[]" value="${idPlato}">`);
    let input = $(`#platoPedidoLista${idPlato}`);

    restaContador.on('click', function () {
        input.remove();
    });

    cantidadPlato.attr('value', 1);

    sumaContador.prop('onclick', null).off('click');
    restaContador.prop('onclick', null).off('click');

    if($('#addPlatoPedidoPlato'+idPlato)){
        $('#addPlatoPedidoPlato'+idPlato).toggleClass('hidden');
        $('#containerContadorPlato'+idPlato).toggleClass('hidden');
    }

    sumaContador.on('click', function () {
        let valor = parseInt(cantidadPlato.attr('value'));
        cantidadPlato.attr('value', valor + 1);

        listaPlatosPedido.append(`<input id="platoPedidoLista${idPlato}" type="hidden" name="platos[]" value="${idPlato}">`);
        let input = $(`#platoPedidoLista${idPlato}`);

        restaContador.on('click', function () {
            input.remove();
        });

    });

    restaContador.on('click', function () {
        let valor = parseInt(cantidadPlato.attr('value'));

        if(valor == 1){
            containerContador.toggleClass('hidden');
            addPlatoPedido.toggleClass('hidden');

            if($('#addPlatoPedidoPlato'+idPlato)){
                $('#addPlatoPedidoPlato'+idPlato).toggleClass('hidden');
                $('#containerContadorPlato'+idPlato).toggleClass('hidden');
            }

            $('#platoPedidoLista'+idPlato).remove();

            let input = $('#platoPedidoLista'+idPlato);
            input.remove();
        }else{
            cantidadPlato.attr('value', valor - 1);
        }
    });


}

function addPlatoPedidoPlato(idPlato){

    let addPlatoPedido = $('#addPlatoPedidoPlato'+idPlato);
    addPlatoPedido.toggleClass('hidden');

    let containerContador = $('#containerContadorPlato'+idPlato);
    containerContador.toggleClass('hidden');

    let cantidadPlato = $('#cantidadPlatoPlato'+idPlato);
    let sumaContador = $('#sumaContadorPlato'+idPlato);
    let restaContador = $('#restaContadorPlato'+idPlato);

    let input = $(`#platoPedidoLista${idPlato}`);

    restaContador.on('click', function () {
        input.remove();
    });

    cantidadPlato.attr('value', 1);

    sumaContador.prop('onclick', null).off('click');
    restaContador.prop('onclick', null).off('click');

    if($('#addPlatoPedido'+idPlato)){
        $('#addPlatoPedido'+idPlato).toggleClass('hidden');
        $('#containerContador'+idPlato).toggleClass('hidden');
    }

    sumaContador.on('click', function () {
        let valor = parseInt(cantidadPlato.attr('value'));
        cantidadPlato.attr('value', valor + 1);

        listaPlatosPedido.append(`<input id="platoPedidoLista${idPlato}" type="hidden" name="platos[]" value="${idPlato}">`);
        let input = $(`#platoPedidoLista${idPlato}`);

        restaContador.on('click', function () {
            input.remove();
        });

    });

    restaContador.on('click', function () {
        let valor = parseInt(cantidadPlato.attr('value'));

        if(valor == 1){
            containerContador.toggleClass('hidden');
            addPlatoPedido.toggleClass('hidden');

            if($('#addPlatoPedido'+idPlato)){
                $('#addPlatoPedido'+idPlato).toggleClass('hidden');
                $('#containerContador'+idPlato).toggleClass('hidden');
            }

            $('#platoPedidoLista'+idPlato).remove();

            input.remove();
        }else{
            cantidadPlato.attr('value', valor - 1);
        }
    });

    listaPlatosPedido.append(`<input id="platoPedidoLista${idPlato}" type="hidden" name="platos[]" value="${idPlato}">`);

}

function añadeCuponPedido(idCupon){


    let inputHidden = $('#cuponPedidoLista'+idCupon);
    let inputHiddenVal = $('#cuponPedidoLista'+idCupon).val();

    if(inputHiddenVal != undefined){

        inputHidden.remove();

        $('#addCuponPedido'+idCupon).addClass('bg-white');
        $('#addCuponPedido'+idCupon).addClass('text-black');
        $('#addCuponPedido'+idCupon).removeClass('bg-transparent');
        $('#addCuponPedido'+idCupon).removeClass('text-white');

        $('#parrafoCupon'+idCupon).html('Añadir al pedido');
    }else{

        listaPlatosPedido.append(`<input id="cuponPedidoLista${idCupon}" type="hidden" name="cupones[]" value="${idCupon}">`);

        $('#addCuponPedido'+idCupon).removeClass('bg-white');
        $('#addCuponPedido'+idCupon).removeClass('text-black');
        $('#addCuponPedido'+idCupon).addClass('bg-transparent');
        $('#addCuponPedido'+idCupon).addClass('text-white');

        $('#parrafoCupon'+idCupon).html('Eliminar del pedido');
    }
}

let selectPlato = $('#selectPlato');
let addPlatoList = $('#addPlatoList');
let createInputPlato = $('#createInputPlato');
let muestraPlato = $('#muestraPlato');
let counterInputs = 0;

addPlatoList.on('click', function () {
    let div = document.createElement('div');
    div.id = 'div' + counterInputs;
    div.classList.add('flex');
    div.classList.add('items-center');
    div.classList.add('w-full');
    muestraPlato.prepend(div);

    let input = document.createElement('input');
    input.name = 'platos[]';
    input.id = 'plato' + counterInputs;
    input.classList.add('border-x-0');
    input.classList.add('border-t-0');
    input.classList.add('mb-6');
    input.classList.add('bg-transparent');
    input.style.width = '90%';
    input.value = selectPlato.find(':selected').text();
    div.prepend(input);

    let trashIcon = document.createElement('i');
    trashIcon.classList.add('fa-solid');
    trashIcon.classList.add('fa-trash');
    trashIcon.classList.add('cursor-pointer');
    trashIcon.style.width = '10%';
    trashIcon.style.textAlign = 'center';
    trashIcon.id = 'trashIcon' + counterInputs;
    trashIcon.addEventListener('click', function () {
        input.remove();
        div.remove();
    })
    div.append(trashIcon);

    counterInputs++;

});

function borrarPlato(id) {

    $('#div' + id).remove();

}

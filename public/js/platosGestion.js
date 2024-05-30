let abrirModalPlato = $('#abrirModalPlato');
let closeModalPlato = $('#closeModalPlato');
let addIngredienteList = $('#addIngredienteList');
let newIngrediente = $('#newIngrediente');
let muestraIngredientes = $('#muestraIngredientes');
let createInputIngrediente = $('#createInputIngrediente');
let selectIngrediente = $('#selectIngrediente');
var counterInputs = 0;

abrirModalPlato.on('click', function () {
    $('#modalPlato').removeClass('hidden');
    $('#modalPlato').addClass('flex');
});

closeModalPlato.on('click', function () {
    $('#modalPlato').removeClass('flex');
    $('#modalPlato').addClass('hidden');
});

addIngredienteList.on('click', function () {
    let div = document.createElement('div');
    div.id = 'div' + counterInputs;
    div.classList.add('flex');
    div.classList.add('items-center');
    div.classList.add('w-full');
    muestraIngredientes.prepend(div);

    let input = document.createElement('input');
    input.name = 'ingredientes[]';
    input.id = 'ingrediente' + counterInputs;
    input.classList.add('border-x-0');
    input.classList.add('border-t-0');
    input.classList.add('mb-6');
    input.style.width = '90%';
    input.value = selectIngrediente.find(':selected').text();
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

createInputIngrediente.on('click', function () {
    let div = document.createElement('div');
    div.id = 'div' + counterInputs;
    div.classList.add('flex');
    div.classList.add('items-center');
    div.classList.add('w-full');
    muestraIngredientes.prepend(div);

    let input = document.createElement('input');
    input.name = 'ingredientes[]';
    input.id = 'ingrediente' + counterInputs;
    input.classList.add('border-x-0');
    input.classList.add('border-t-0');
    input.classList.add('mb-6');
    input.style.width = '90%';
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

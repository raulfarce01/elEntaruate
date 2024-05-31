let createInputIngrediente = $('#createInputIngrediente');
counterInputs = 0;
let addIngredienteList = $('#addIngredienteList');
let selectIngrediente = $('#selectIngrediente');

function deleteIngrediente(div){
    div.remove();
}

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
    input.classList.add('bg-transparent');
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

addIngredienteList.on('click', function () {
    let div = document.createElement('div');
    div.id = 'div' + counterInputs;
    div.classList.add('flex');
    div.classList.add('items-center');
    div.classList.add('w-full');
    div.classList.add('px-6');
    muestraIngredientes.prepend(div);

    let input = document.createElement('input');
    input.name = 'ingredientes[]';
    input.id = 'ingrediente' + counterInputs;
    input.classList.add('border-x-0');
    input.classList.add('border-t-0');
    input.classList.add('mb-6');
    input.style.width = '90%';
    input.classList.add('bg-transparent');
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

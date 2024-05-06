<form action="{{ route('plato_add') }}" method="post">

    <h2>Plato</h2>

    @csrf
    <label for="nombre">nombre: </label>
    <input type="text" name="nombre" id="nombre" placeholder="Put the title here...">
    <label for="ruta">ruta: </label>
    <input type="text" name="ruta" id="ruta" placeholder="Put the title here...">
    <div id="authorsDiv">
        <label for="ingredientes[]">ingrediente: </label>
        <input type="text" name="ingredientes[]" id="ingrediente">
        <a href='javascript:void(0)' onclick="moreAuthors()">New Author</a>
    </div>
    <button type="submit">Guardar Plato</button>

</form>

<form action="{{ route('cupon_add') }}" method="post">

    <h2>Cupón</h2>

    @csrf
    <label for="nombre">nombre: </label>
    <input type="text" name="nombre" id="nombre" placeholder="Put the title here...">
    <label for="descripcion">descripcion: </label>
    <input type="text" name="descripcion" id="descripcion" placeholder="Put the title here...">
    <label for="caducidad">caducidad: </label>
    <input type="text" name="caducidad" id="caducidad" placeholder="Put the title here...">
    <label for="porcentaje">porcentaje: </label>
    <input type="text" name="porcentaje" id="porcentaje" placeholder="Put the title here...">
    <button type="submit">Guardar Cupón</button>


</form>

<form action="{{ route('reserva_add') }}" method="post">

    <h2>Reservas</h2>

    @csrf
    <label for="user">user: </label>
    <input type="text" name="user" id="user" placeholder="Put the title here...">
    <label for="fecha">fecha: </label>
    <input type="date" name="fecha" id="fecha" placeholder="Put the title here...">
    <button type="submit">Guardar Reserva</button>


</form>



    <script>

        var index = 2
        function moreAuthors(){
            let spanAuthor = document.createElement('span');
            let authorsdiv = document.getElementById("authorsDiv");
            let newInput = document.createElement("input");
            let br = document.createElement("br");
            newInput.type = "text";
            newInput.id = "ingrediente"+index;
            newInput.name = "ingredientes[]";

            spanAuthor.innerHTML = "ingrediente " + index + ":";
            console.log(spanAuthor)
            authorsdiv.append(br);
            authorsdiv.append(spanAuthor);
            authorsdiv.append(newInput);
            index++;
        }

    </script>

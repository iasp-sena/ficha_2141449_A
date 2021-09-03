<script>

    function carcarCamposParticulares(tipoPersona){
        let campos = '';
        switch (tipoPersona){
            case '1': campos = cargarCamposJugador(); break;
            case '2': campos = cargarCamposEntrenador(); break;
            case '3': campos = cargarCamposMedico(); break;
        }
        document.querySelector("#camposParticulares").innerHTML = campos;
    }

    function cargarCamposJugador(){
        return '<div class="form-group">'+
            '<label for="numero">Número</label>'+
            '<input type="number" class="form-control" id="numero" name="numero" placeholder="10"/>'+
            '</div>'+
            '<div class="form-group">'+
            '<label for="posicion">Posicion</label>'+
            '<input type="text" class="form-control" id="posicion" name="posicion" placeholder="Central"/>'+
            '</div>';
    }

    function cargarCamposEntrenador(){
        return '<div class="form-group">'+
            '<label for="categorias">Categorias</label>'+
            '<input type="text" class="form-control" id="categorias" name="categorias" placeholder="Infantil, Mayores"/>'+
            '</div>';
    }

    function cargarCamposMedico(){
        return '<div class="form-group">'+
            '<label for="especialidad">Especialidad</label>'+
            '<input type="text" class="form-control" id="especialidad" name="especialidad" placeholder="Nutricionista"/>'+
            '</div>';
    }

    $(document).ready(function(){
        //alert("Ok.....");
    });
</script>
<script>

    function ocultarDatosEspecificos(){
        document.getElementById("datosJugador").style.display = "none";
        document.getElementById("datosMedico").style.display = "none";
        document.getElementById("datosEntrenador").style.display = "none";
    }

    function carcarCamposParticulares(tipoPersona){
        ocultarDatosEspecificos();
        switch (tipoPersona){
            case '1': cargarCamposJugador(); break;
            case '2': cargarCamposEntrenador(); break;
            case '3': cargarCamposMedico(); break;
        }
    }

    function cargarCamposJugador(){
        document.getElementById("datosJugador").style.display = "block";
    }

    function cargarCamposEntrenador(){
        document.getElementById("datosEntrenador").style.display = "block";
    }

    function cargarCamposMedico(){
        document.getElementById("datosMedico").style.display = "block";
    }

    $(document).ready(function(){
        ocultarDatosEspecificos();
    });
</script>
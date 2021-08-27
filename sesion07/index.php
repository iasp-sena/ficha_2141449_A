<?php
session_start();
if(!isset($_SESSION["usuarioSesion"])){
    header("Location: login.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestión de equipo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
            integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <?php include "menu.php"; ?>
    <div class="row">
        <div class="col">

            <h3>Registro usuario</h3>
            <hr/>
            <?php
            if(isset($_SESSION["mensaje"])){
                ?>
                <div class="alert alert-primary" role="alert">
                    <?php
                    echo $_SESSION["mensaje"];
                    $_SESSION["mensaje"] = null;
                    ?>
                </div>
                <?php
            }
            ?>
            <form action="registrar.php" method="post">
                <div class="form-group">
                    <label for="tipoDocumento">Tipo documento</label>
                    <input type="text" class="form-control" id="tipoDocumento" name="tipoDocumento" placeholder="CC"/>
                </div>
                <div class="form-group">
                    <label for="numeroDocumento">Numero documento</label>
                    <input type="text" class="form-control" id="numeroDocumento" name="numeroDocumento"
                           placeholder="123456789"/>
                </div>
                <div class="form-group">
                    <label for="nombres">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Carlos Iván"/>
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Rodriguez"/>
                </div>

                <div class="form-group">
                    <label for="tipoPersona">Tipo de persona</label>
                    <select id="tipoPersona" name="tipoPersona" onchange="carcarCamposParticulares(this.value)">
                        <option value="">Seleccione un tipo de persona...</option>
                        <option value="1">Jugador</option>
                        <option value="2">Entrenador</option>
                        <option value="3">Medico</option>
                    </select>
                </div>

                <div id="camposParticulares"></div>

                <hr/>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="btnRegistroPersona" value="registrar">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

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
</body>
</html>
<?php
session_start();
require_once "Jugador.php";
require_once "Equipo.php";
$equipo = isset($_SESSION["equipoSesion"]) ? unserialize($_SESSION["equipoSesion"]) : null;
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

            <h3>Login</h3>
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
            <form action="login_controller.php" method="post">
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="pperez"/>
                </div>
                <div class="form-group">
                    <label for="clave">Usuario</label>
                    <input type="password" class="form-control" id="clave" name="clave" placeholder="Ingrese su clave"/>
                </div>
                <hr/>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="btnIngreso" value="ingresar">
                        Ingresar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
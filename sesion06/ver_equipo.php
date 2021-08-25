<?php
session_start();
if(!isset($_SESSION["usuarioSesion"])){
    header("Location: login.php");
    exit();
}
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

            <h3>Informacion Equipo</h3>
            <hr/>
            <?php
            if (!is_null($equipo)){
                ?>
                <h4>Jugadores</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">TD</th>
                        <th scope="col">NUM DOC</th>
                        <th scope="col">NOMBRES</th>
                        <th scope="col">APELLIDOS</th>
                        <th scope="col">NUMERO</th>
                        <th scope="col">POSICION</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($equipo->getJugadores() as $jugador){
                        ?>
                        <tr>
                            <td><?= $jugador->getTipoDocumento() ?></td>
                            <td><?= $jugador->getNumeroDocumento() ?></td>
                            <td><?= $jugador->getNombres() ?></td>
                            <td><?= $jugador->getApellidos() ?></td>
                            <td><?= $jugador->getNumero() ?></td>
                            <td><?= $jugador->getPosicion() ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                <hr/>
                <h4>Entrenador</h4>
                <?php
                if(!is_null($equipo->getEntrenador())){
                    echo $equipo->getEntrenador()->getNombres();
                } else{
                    echo "No se ha asociado un entrenador";
                }
                ?>
                <hr/>
                <h4>Médico</h4>
                <?php
                if(!is_null($equipo->getMedico())){
                    echo $equipo->getMedico()->getNombres();
                } else{
                    echo "No se ha asociado un médico";
                }
                ?>

            <?php
            } else{
                ?>
                <p>No se ha creado ningún equipo actualmente</p>
            <?php
            }
            ?>
        </div>
    </div>
</div>

</body>
</html>
<?php
$cantidadTelefonos = 2;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>Registro usuario</h3>
                <hr/>
                <form action="usuario_registro.php" method="get">
                    <div class="form-group">
                        <label for="tipoDocumento">Tipo documento</label>
                        <input type="text" class="form-control" id="tipoDocumento" name="tipoDocumento" placeholder="CC"/>
                    </div>
                    <div class="form-group">
                        <label for="numeroDocumento">Numero documento</label>
                        <input type="text" class="form-control" id="numeroDocumento" name="numeroDocumento" placeholder="123456789"/>
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
                        <label for="correo">Correo</label>
                        <input type="email" class="form-control" id="correo" name="email" placeholder="aaaa@app.com"/>
                    </div>



                    <div class="form-group">
                        <label for="telefono">Telefonos</label>
                        <?php for($i = 0; $i < $cantidadTelefonos; $i++) { ?>
                        <input type="number" class="form-control" id="telefono" name="telefono[]" placeholder="aaaa@app.com"/>
                        <?php } ?>
                    </div>


                    <hr/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="btnRegistroUsuario" value="registrarUsuario">Guardar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>